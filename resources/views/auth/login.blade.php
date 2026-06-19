@extends('auth.authLayout')

@section('title', 'Login')

@section('content')
    <form action="{{ route('login') }}" method="POST" class="auth-form">
        @csrf

        <h2 class="form-title">Welcome Back</h2>
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
            @error('email')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                class="form-control @error('password') is-invalid @enderror"
                placeholder="Enter your password"
                required
            >
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
            <p>Don't have an account? <a href="{{ route('register') }}" class="signup-link">Sign up here</a></p>
        </div>
    </form>

    <style>
        .auth-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-title {
            font-size: 28px;
            font-weight: bold;
            color: #1b1b18;
            margin: 0;
            text-align: center;
        }

        .form-subtitle {
            font-size: 14px;
            color: #666;
            text-align: center;
            margin: 0;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-label {
            font-size: 14px;
            font-weight: 600;
            color: #333;
        }

        .form-control {
            padding: 10px 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: #0f5cfd;
            box-shadow: 0 0 0 3px rgba(15, 92, 253, 0.1);
        }

        .form-control.is-invalid {
            border-color: #dc3545;
        }

        .error-message {
            font-size: 12px;
            color: #dc3545;
        }

        .alert {
            padding: 12px;
            border-radius: 8px;
            font-size: 14px;
        }

        .alert-danger {
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }

        .alert ul {
            margin: 0;
            padding-left: 20px;
        }

        .alert li {
            margin: 5px 0;
        }

        .checkbox-group {
            flex-direction: row;
            align-items: center;
            gap: 8px;
        }

        .checkbox-group input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
        }

        .checkbox-group label {
            margin: 0;
            cursor: pointer;
            font-size: 14px;
            color: #333;
        }

        .btn {
            padding: 10px 12px;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-primary {
            background-color: #0f5cfd;
            color: white;
        }

        .btn-primary:hover {
            background-color: #0d4ed1;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(15, 92, 253, 0.3);
        }

        .form-footer {
            text-align: center;
            font-size: 14px;
            color: #666;
        }

        .form-footer a {
            color: #0f5cfd;
            text-decoration: none;
            font-weight: 600;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }
    </style>
@endsection
