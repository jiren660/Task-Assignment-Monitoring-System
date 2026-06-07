@extends('layouts.app')

@section('title', 'Login — TAM System')

@push('styles')
<style>
    .login-wrapper {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 24px;
        background-color: #f5f5f5;
    }

    .login-box {
        width: 100%;
        max-width: 420px;
        background: #ffffff;
        border: 1px solid #d4d4d4;
        border-radius: 8px;
        padding: 48px 40px;
    }

    /* Header */
    .login-header {
        text-align: center;
        margin-bottom: 36px;
    }

    .login-header h1 {
        font-size: 1.5rem;
        font-weight: 700;
        letter-spacing: -0.3px;
        color: #111111;
    }

    .login-header p {
        font-size: 0.85rem;
        color: #737373;
        margin-top: 4px;
    }

    .divider {
        width: 40px;
        height: 3px;
        background: #111111;
        margin: 14px auto 0;
        border-radius: 2px;
    }

    /* Form fields */
    .field {
        margin-bottom: 18px;
    }

    .field label {
        display: block;
        font-size: 0.8rem;
        font-weight: 600;
        color: #404040;
        margin-bottom: 6px;
        letter-spacing: 0.3px;
    }

    .field input[type="email"],
    .field input[type="password"] {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #d4d4d4;
        border-radius: 6px;
        font-family: 'Inter', sans-serif;
        font-size: 0.9rem;
        color: #111111;
        background: #fafafa;
        outline: none;
        transition: border-color 0.15s;
    }

    .field input:focus {
        border-color: #111111;
        background: #fff;
    }

    /* Errors */
    .error-msg {
        font-size: 0.8rem;
        color: #b91c1c;
        margin-top: 5px;
    }

    /* Remember */
    .remember-row {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 24px;
    }

    .remember-row input[type="checkbox"] {
        width: 15px;
        height: 15px;
        cursor: pointer;
    }

    .remember-row label {
        font-size: 0.85rem;
        color: #525252;
        cursor: pointer;
    }

    /* Submit */
    .btn-submit {
        width: 100%;
        padding: 11px;
        background: #111111;
        color: #ffffff;
        border: none;
        border-radius: 6px;
        font-family: 'Inter', sans-serif;
        font-size: 0.9rem;
        font-weight: 600;
        cursor: pointer;
        letter-spacing: 0.3px;
        transition: background 0.15s;
    }

    .btn-submit:hover {
        background: #333333;
    }

    /* Demo accounts */
    .demo-section {
        margin-top: 28px;
        padding-top: 24px;
        border-top: 1px solid #e5e5e5;
    }

    .demo-section p {
        font-size: 0.78rem;
        color: #737373;
        text-align: center;
        margin-bottom: 12px;
    }

    .demo-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.78rem;
    }

    .demo-table tr {
        border-bottom: 1px solid #e5e5e5;
    }

    .demo-table tr:last-child {
        border-bottom: none;
    }

    .demo-table td {
        padding: 7px 4px;
        color: #525252;
    }

    .demo-table td:last-child {
        text-align: right;
        font-weight: 600;
        color: #111111;
    }
</style>
@endpush

@section('content')
<div class="login-wrapper">
    <div class="login-box">

        <div class="login-header">
            <h1>TAM System</h1>
            <p>Task Assignment &amp; Monitoring</p>
            <div class="divider"></div>
        </div>

        <form method="POST" action="{{ route('login.post') }}">
            @csrf

            <div class="field">
                <label for="email">Email Address</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="you@school.edu"
                    autocomplete="email"
                    autofocus
                />
                @error('email')
                    <p class="error-msg">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="password">Password</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    placeholder="••••••••"
                    autocomplete="current-password"
                />
                @error('password')
                    <p class="error-msg">{{ $message }}</p>
                @enderror
            </div>

            <div class="remember-row">
                <input type="checkbox" id="remember" name="remember" />
                <label for="remember">Remember me</label>
            </div>

            <button id="btn-login" type="submit" class="btn-submit">Sign In</button>
        </form>

        <div class="demo-section">
            <p>Demo accounts &mdash; password: <strong>password</strong></p>
            <table class="demo-table">
                <tr>
                    <td>admin@tam.test</td>
                    <td>Admin</td>
                </tr>
                <tr>
                    <td>teacher@tam.test</td>
                    <td>Teacher</td>
                </tr>
                <tr>
                    <td>student@tam.test</td>
                    <td>Student</td>
                </tr>
            </table>
        </div>

    </div>
</div>
@endsection
