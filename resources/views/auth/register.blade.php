@extends('auth.authLayout')

@section('title', 'Sign Up')

@section('content')
    <form action="{{ route('register') }}" method="POST" class="auth-form">
        @csrf

        <h2 class="form-title">Create Account</h2>
        <p class="form-subtitle">Sign up to get started</p>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-row">
            <div class="form-group">
                <label for="first_name" class="form-label">First Name</label>
                <input
                    type="text"
                    id="first_name"
                    name="first_name"
                    class="form-control @error('first_name') is-invalid @enderror"
                    value="{{ old('first_name') }}"
                    placeholder="First name"
                    required
                    autofocus
                >
                @error('first_name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="last_name" class="form-label">Last Name</label>
                <input
                    type="text"
                    id="last_name"
                    name="last_name"
                    class="form-control @error('last_name') is-invalid @enderror"
                    value="{{ old('last_name') }}"
                    placeholder="Last name"
                    required
                >
                @error('last_name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Email Address</label>
            <input
                type="email"
                id="email"
                name="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email') }}"
                placeholder="Enter your email"
                required
            >
            @error('email')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <div class="password-wrapper">
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="form-control @error('password') is-invalid @enderror"
                    placeholder="Enter your password"
                    required
                >
                <span class="toggle-password" onclick="togglePassword('password')"><i class="bi bi-eye"></i></span>
            </div>
        </div>

        <div class="form-group">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <div class="password-wrapper">
                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    class="form-control @error('password_confirmation') is-invalid @enderror"
                    placeholder="Confirm your password"
                    required
                >
                <span class="toggle-password" onclick="togglePassword('password_confirmation')"><i class="bi bi-eye"></i></span>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Sign Up</button>

        <div class="form-footer">
            <p>Already have an account? <a href="{{ route('login') }}" class="login-link">Log in here</a></p>
        </div>
    </form>
@endsection
