@extends('auth.authLayout')

@section('title', 'Login')

@section('content')
    <form action="{{ route('login') }}" method="POST" class="auth-form">
        @csrf

        <h2 class="form-title">Welcome!</h2>
        <p class="form-subtitle">Log in to your account</p>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

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
                autofocus
            >
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
            @error('password')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group checkbox-group">
            <input
                type="checkbox"
                id="remember"
                name="remember"
                {{ old('remember') ? 'checked' : '' }}
            >
            <label for="remember">Remember me</label>
        </div>

        <button type="submit" class="btn btn-primary">Sign In</button>

        <div class="form-footer">
            <p><a href="{{ route('password.request') }}">Forgot your password?</a></p>
            <p>Don't have an account? <a href="{{ route('register') }}" class="signup-link">Sign up here</a></p>
        </div>
    </form>
@endsection
