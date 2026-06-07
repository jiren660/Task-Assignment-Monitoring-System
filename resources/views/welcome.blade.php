@extends('layouts.app')

@section('title', 'Welcome — TAM System')

@push('styles')
<style>
    /* ── SAMPLE TESTING ─────────────────────────────────── */
    .topbar {
        background: #111111;
        color: #ffffff;
        padding: 0 40px;
        height: 56px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .topbar-brand {
        font-size: 0.95rem;
        font-weight: 700;
        letter-spacing: -0.2px;
        color: #ffffff;
    }

    .topbar-right {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .topbar-user {
        font-size: 0.82rem;
        color: #a3a3a3;
    }

    .topbar-user strong {
        color: #ffffff;
        font-weight: 600;
    }

    .topbar-role {
        font-size: 0.72rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border: 1px solid #404040;
        border-radius: 4px;
        padding: 2px 8px;
        color: #d4d4d4;
    }

    .btn-logout {
        background: transparent;
        border: 1px solid #404040;
        border-radius: 4px;
        color: #d4d4d4;
        font-family: 'Inter', sans-serif;
        font-size: 0.82rem;
        font-weight: 500;
        padding: 6px 14px;
        cursor: pointer;
        transition: background 0.15s, border-color 0.15s;
    }

    .btn-logout:hover {
        background: #222222;
        border-color: #737373;
    }

    /* ── Main ─────────────────────────────────────── */
    .page-wrapper {
        min-height: calc(100vh - 56px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 48px 24px;
        background-color: #f5f5f5;
    }

    .welcome-card {
        width: 100%;
        max-width: 560px;
        background: #ffffff;
        border: 1px solid #d4d4d4;
        border-radius: 8px;
        overflow: hidden;
    }

    /* Role-colored top strip */
    .card-stripe {
        height: 4px;
        background: #111111;
    }

    .card-body {
        padding: 40px 40px 36px;
    }

    /* Role label */
    .role-label {
        font-size: 0.72rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #737373;
        margin-bottom: 8px;
    }

    .card-body h2 {
        font-size: 1.6rem;
        font-weight: 700;
        letter-spacing: -0.3px;
        color: #111111;
        margin-bottom: 6px;
    }

    .card-body .welcome-name {
        font-size: 1.6rem;
        font-weight: 300;
        color: #404040;
    }

    .card-divider {
        width: 36px;
        height: 3px;
        background: #111111;
        margin: 16px 0;
        border-radius: 2px;
    }

    .card-body p.description {
        font-size: 0.88rem;
        color: #525252;
        line-height: 1.7;
        margin-bottom: 24px;
    }

    /* Feature list */
    .feature-list {
        list-style: none;
        margin-bottom: 28px;
        border-top: 1px solid #e5e5e5;
        padding-top: 20px;
    }

    .feature-list li {
        font-size: 0.85rem;
        color: #404040;
        padding: 9px 0;
        border-bottom: 1px solid #e5e5e5;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .feature-list li::before {
        content: '';
        display: inline-block;
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #111111;
        flex-shrink: 0;
    }

    .feature-list li span.coming {
        margin-left: auto;
        font-size: 0.7rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        color: #a3a3a3;
        border: 1px solid #e5e5e5;
        border-radius: 3px;
        padding: 2px 6px;
    }

    /* Coming soon notice */
    .coming-soon-notice {
        background: #f5f5f5;
        border: 1px solid #e5e5e5;
        border-radius: 6px;
        padding: 12px 16px;
        font-size: 0.82rem;
        color: #737373;
        text-align: center;
    }

    /* Footer */
    .page-footer {
        text-align: center;
        padding: 24px;
        font-size: 0.76rem;
        color: #a3a3a3;
        border-top: 1px solid #e5e5e5;
    }
</style>
@endpush

@section('content')
@php $user = auth()->user(); @endphp

{{-- Top bar --}}
<header class="topbar">
    <span class="topbar-brand">TAM System</span>
    <div class="topbar-right">
        <span class="topbar-user">
            Logged in as <strong>{{ $user->name }}</strong>
        </span>
        <span class="topbar-role">{{ ucfirst($user->role) }}</span>
        <form method="POST" action="{{ route('logout') }}" style="margin:0;">
            @csrf
            <button id="btn-logout" type="submit" class="btn-logout">Sign Out</button>
        </form>
    </div>
</header>

{{-- Main --}}
<main class="page-wrapper">
    <div class="welcome-card">
        <div class="card-stripe"></div>
        <div class="card-body">

            {{-- ── ADMIN ──────────────────────────────── --}}
            @if($user->isAdmin())
                <p class="role-label">Dean / Administrator</p>
                <h2>Welcome, <span class="welcome-name">{{ $user->name }}</span></h2>
                <div class="card-divider"></div>
                <p class="description">
                    You have full control over the system. Manage users, set up classes and subjects,
                    assign teachers, and monitor institution-wide performance.
                </p>
                <ul class="feature-list">
                    <li>User Management <span class="coming">Coming soon</span></li>
                    <li>Class &amp; Subject Setup <span class="coming">Coming soon</span></li>
                    <li>Assign Teachers to Subjects <span class="coming">Coming soon</span></li>
                    <li>Department Reports <span class="coming">Coming soon</span></li>
                    <li>Audit Logs <span class="coming">Coming soon</span></li>
                    <li>System Settings <span class="coming">Coming soon</span></li>
                </ul>

            {{-- ── TEACHER ─────────────────────────────── --}}
            @elseif($user->isTeacher())
                <p class="role-label">Subject Teacher</p>
                <h2>Welcome, <span class="welcome-name">{{ $user->name }}</span></h2>
                <div class="card-divider"></div>
                <p class="description">
                    Create and manage assignments, track student submissions,
                    evaluate work, and send reminders — all from your dashboard.
                </p>
                <ul class="feature-list">
                    <li>My Classes &amp; Student Roster <span class="coming">Coming soon</span></li>
                    <li>Assignment Manager <span class="coming">Coming soon</span></li>
                    <li>Submissions Inbox <span class="coming">Coming soon</span></li>
                    <li>Grade &amp; Leave Comments <span class="coming">Coming soon</span></li>
                    <li>Send Reminders to Students <span class="coming">Coming soon</span></li>
                </ul>

            {{-- ── STUDENT ─────────────────────────────── --}}
            @else
                <p class="role-label">Student</p>
                <h2>Welcome, <span class="welcome-name">{{ $user->name }}</span></h2>
                <div class="card-divider"></div>
                <p class="description">
                    Track your assignments, submit your work, view grades and teacher feedback,
                    and stay on top of every deadline.
                </p>
                <ul class="feature-list">
                    <li>My Assignments &amp; Deadlines <span class="coming">Coming soon</span></li>
                    <li>Submit PDF or Code <span class="coming">Coming soon</span></li>
                    <li>Unsubmit &amp; Resubmit Before Deadline <span class="coming">Coming soon</span></li>
                    <li>Grades &amp; Feedback <span class="coming">Coming soon</span></li>
                    <li>Calendar View <span class="coming">Coming soon</span></li>
                </ul>
            @endif

            <div class="coming-soon-notice">
                Dashboard is under construction &mdash; skeleton mode active.
            </div>

        </div>
    </div>
</main>

<footer class="page-footer">
    &copy; {{ date('Y') }} Task Assignment &amp; Monitoring System
</footer>

@endsection
