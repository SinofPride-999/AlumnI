@extends('layouts.auth')

@section('title', 'Register - Alumni Connect')

@section('content')
<main class="auth-container">
    <div class="auth-form-container">
        <div class="auth-form-wrapper">
            <div class="form-header">
                <h1>Join Our Network</h1>
                <p>Create an account to reconnect with your alma mater</p>
            </div>
            
            <form class="auth-form" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-row">
                    <div class="form-group floating">
                        <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                        <label for="first_name">First Name</label>
                        <i class="fas fa-user icon"></i>
                        @error('first_name')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group floating">
                        <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                        <label for="last_name">Last Name</label>
                        <i class="fas fa-user icon"></i>
                        @error('last_name')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group floating">
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                    <label for="email">Email Address</label>
                    <i class="fas fa-envelope icon"></i>
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group floating">
                    <input type="text" id="graduation_year" name="graduation_year" value="{{ old('graduation_year') }}" required>
                    <label for="graduation_year">Graduation Year</label>
                    <i class="fas fa-graduation-cap icon"></i>
                    @error('graduation_year')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group floating">
                    <select id="degree" name="degree" required>
                        <option value="">Select your degree program</option>
                        @foreach($degreePrograms as $program)
                        <option value="{{ $program->id }}" {{ old('degree') == $program->id ? 'selected' : '' }}>{{ $program->name }}</option>
                        @endforeach
                    </select>
                    <label for="degree">Degree Program</label>
                    <i class="fas fa-book icon"></i>
                    @error('degree')
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
                <div class="password-strength">
                    <div class="strength-meter">
                        <span class="strength-bar"></span>
                        <span class="strength-bar"></span>
                        <span class="strength-bar"></span>
                    </div>
                    <span class="strength-text">Password strength</span>
                </div>
                
                <div class="form-group floating">
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                    <label for="password_confirmation">Confirm Password</label>
                    <i class="fas fa-lock icon"></i>
                    <button type="button" class="toggle-password" aria-label="Toggle password visibility">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
                
                <div class="form-agreement">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></label>
                    @error('terms')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary btn-block">
                    <span>Create Account</span>
                    <i class="fas fa-user-plus"></i>
                </button>
                
                <div class="auth-footer">
                    <p>Already have an account? <a href="{{ route('login') }}">Sign in here</a></p>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/auth.js') }}"></script>
@endsection