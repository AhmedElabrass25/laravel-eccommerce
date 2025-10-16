<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // validation
        $errors = Validator::make($request->all(), [
            'name' => 'required|string|max:255|min:2',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',

        ]);
        if ($errors->fails()) {
            return response()->json(['error' => $errors->errors()], 422);
        }
        // hash password
        $hashedPassword = bcrypt($request->password);
        // create token
        $accessToken = bin2hex(random_bytes(60));
        // dd($accessToken);
        // create user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashedPassword,
            'access_token' => $accessToken
        ]);
        return response()->json(['message' => 'User registered successfully', 'access_token' => $accessToken], 201);
    }
    public function login(Request $request)
    {
        // validation
        $errors = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',

        ]);
        if ($errors->fails()) {
            return response()->json(['error' => $errors->errors()], 422);
        }
        // check email
        $user = User::where('email', $request->email)->first();
        if ($user) {
            // borken hash
            $valid = Hash::check($request->password, $user->password);
            // update token
            if ($valid) {
                $accessToken = bin2hex(random_bytes(60));
                $user->update(['access_token' => $accessToken]);
                // return response()->json(['message' => 'User logged in successfully', 'access_token' => $accessToken], 200);
            } else {
                return response()->json(['message' => 'Invalid credentials'], 401);
            }
        } else {
            return response()->json(['message' => 'error credentials email or password !'], 404);
        }
        return response()->json(["message" => "Welcome " . $user->name . " User logged in successfully", "access_token" => $accessToken], 200);
    }
    public function logout(Request $request)
    {
        // check that user is logged in (have access token)
        $accessToken = $request->header('access_token');
        if ($accessToken != null) {
            $user = User::where('access_token', $accessToken)->first();
            if ($user) {
                $user->update(['access_token' => null]);
                return response()->json(['message' => 'User logged out successfully'], 200);
            } else {
                return response()->json(['message' => 'User not found'], 404);
            }
        } else {
            return response()->json(['message' => 'access token not found !'], 404);
        }
        return response()->json(['message' => 'User logged out successfully'], 200);
    }
}
