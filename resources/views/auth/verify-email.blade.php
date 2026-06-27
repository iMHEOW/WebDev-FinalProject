@extends('auth.authLayout')

@section('title', 'Verify Email')

@section('content')
    <div class="auth-form">
        <h2 class="form-title">Verify Your Email</h2>
        <p class="form-subtitle">A verification link has been sent to your email address.</p>

        @if (session('status') == 'verification-link-sent')
            <div class="alert alert-success">The verification link has been resent.</div>
        @endif

        <form action="{{ route('verification.send') }}" method="POST" class="w-100">
            @csrf
            <button type="submit" class="btn btn-primary w-100">Resend Verification Email</button>
        </form>

        <div class="form-footer">
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-link p-0 m-0 align-baseline text-decoration-none text-danger fw-semibold">Log out</button>
            </form>
        </div>
    </div>
@endsection