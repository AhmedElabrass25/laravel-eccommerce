@extends('layouts.user')

@section('content')
<!-- Header -->
<div class="page-heading products-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="text-content">
          <h4>Register Page</h4>
          <h2>sixteen products</h2>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Register Form -->
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow rounded-3 border-0">
                <div class="card-body p-4">

                    <!-- Validation Errors -->
                    <x-validation-errors class="mb-3" />

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <div class="mb-3">
                            <x-label for="name" value="{{ __('Name') }}" />
                            <x-input id="name" class="form-control" type="text" 
                                     name="name" :value="old('name')" required autofocus autocomplete="name" />
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input id="email" class="form-control" type="email" 
                                     name="email" :value="old('email')" required autocomplete="username" />
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <x-label for="password" value="{{ __('Password') }}" />
                            <x-input id="password" class="form-control" type="password" 
                                     name="password" required autocomplete="new-password" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                            <x-input id="password_confirmation" class="form-control" type="password" 
                                     name="password_confirmation" required autocomplete="new-password" />
                        </div>

                        <!-- Terms and Privacy -->
                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="form-check mb-3">
                                <x-checkbox name="terms" id="terms" class="form-check-input" required />
                                <label for="terms" class="form-check-label">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="text-decoration-none">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="text-decoration-none">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </label>
                            </div>
                        @endif

                        <!-- Actions -->
                        <div class="d-flex justify-content-between align-items-center">
                            <a class="text-decoration-none small" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>

                            <x-button class="btn btn-primary">
                                {{ __('Register') }}
                            </x-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
