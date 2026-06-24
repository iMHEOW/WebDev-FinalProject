@extends('auth.authLayout')

@section('title', 'Forgot Password')

@section('content')
    <form action="{{ route('password.email') }}" method="POST" class="auth-form">
        @csrf

        <h2 class="form-title">Forgot Password</h2>
        <p class="form-subtitle">Enter your email and we'll send you a reset link</p>

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

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
            <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
        </div>

        <button type="submit" class="btn btn-primary">Send Reset Link</button>

        <div class="form-footer">
            <p>Remember your password? <a href="{{ route('login') }}">Log in here</a></p>
        </div>
    </form>
@endsection