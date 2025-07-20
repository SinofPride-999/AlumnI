@extends('layouts.auth')

@section('title', 'Login - Alumni Connect')

@section('content')
<main class="auth-container">
    <div class="auth-form-container">
        <div class="auth-form-wrapper">
            <div class="form-header">
                <h1>Welcome Back</h1>
                <p>Sign in to reconnect with your alma mater</p>
            </div>
            
            <form class="auth-form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group floating">
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
                    <label for="email">Email Address</label>
                    <i class="fas fa-envelope icon"></i>
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group floating password-group">
                    <input type="password" id="password" name="password" required>
                    <label for="password">Password</label>
                    <i class="fas fa-lock icon"></i>
                    <button type="button" class="toggle-password" aria-label="Toggle password visibility">
                        <i class="fas fa-eye"></i>
                    </button>
                    @error('password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-options">
                    <div class="remember-me">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Remember me</label>
                    </div>
                    <a href="{{ route('password.request') }}" class="forgot-password">Forgot password?</a>
                </div>
                
                <button type="submit" class="btn btn-primary btn-block">
                    <span>Sign In</span>
                    <i class="fas fa-sign-in-alt"></i>
                </button>
                
                <div class="auth-footer">
                    <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/auth.js') }}"></script>
@endsection