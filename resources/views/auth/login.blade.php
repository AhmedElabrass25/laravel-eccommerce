@extends('layouts.user')

@section('content')
<!-- Header -->
<div class="page-heading products-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="text-content">
          <h4>Login Page</h4>
          <h2>sixteen products</h2>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Login Form -->
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow rounded-3 border-0">
                <div class="card-body p-4">

                    <!-- Validation Errors -->
                    <x-validation-errors class="mb-3" />

                    @session('status')
                        <div class="alert alert-success mb-3">
                            {{ $value }}
                        </div>
                    @endsession

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email -->
                        <div class="mb-3">
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input id="email" class="form-control" type="email" name="email" 
                                :value="old('email')" required autofocus autocomplete="username" />
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <x-label for="password" value="{{ __('Password') }}" />
                            <x-input id="password" class="form-control" type="password" name="password" 
                                required autocomplete="current-password" />
                        </div>

                        <!-- Remember Me -->
                        <div class="form-check mb-3">
                            <x-checkbox id="remember_me" name="remember" class="form-check-input" />
                            <label for="remember_me" class="form-check-label">
                                {{ __('Remember me') }}
                            </label>
                        </div>

                        <!-- Actions -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            @if (Route::has('password.request'))
                                <a class="text-decoration-none small" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </div>

                        <!-- Login Button -->
                        <div class="d-grid">
                            <x-button class="btn btn-primary">
                                {{ __('Log in') }}
                            </x-button>
                        </div>

                        <!-- Register Link -->
                        <div class="text-center mt-3">
                            <a class="text-decoration-none small" href="{{ route('register') }}">
                                {{ __('Don\'t have an account? Register here') }}
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
