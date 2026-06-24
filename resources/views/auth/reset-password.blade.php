@extends('auth.authLayout')

@section('title', 'Reset Password')

@section('content')
    <form action="{{ route('password.update') }}" method="POST" class="auth-form">
        @csrf

        <h2 class="form-title">Reset Password</h2>
        <p class="form-subtitle">Enter your new password</p>

        <input type="hidden" name="token" value="{{ $token }}">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <input type="hidden" name="email" value="{{ request()->email }}">

        <div class="form-group">
            <label for="password" class="form-label">New Password</label>
            <div class="password-wrapper">
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter new password" required>
                <span class="toggle-password" onclick="togglePassword('password')"><i class="fa fa-eye"></i></span>
            </div>
        </div>

        <div class="form-group">
            <label for="password_confirmation" class="form-label">Confirm New Password</label>
            <div class="password-wrapper">
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm new password" required>
                <span class="toggle-password" onclick="togglePassword('password_confirmation')"><i class="fa fa-eye"></i></span>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Reset Password</button>
    </form>
@endsection