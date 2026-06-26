<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PUP Care - @yield('title', 'Patient Dashboard')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @yield('styles')
</head>
<body class="antialiased" style="background-color: #f0f4fa; color: #475569; font-family: system-ui, -apple-system, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">

    <div class="d-flex vh-100 overflow-hidden">
        
        <aside class="bg-white border-end p-4 d-flex flex-column justify-content-between h-100 flex-shrink-0" style="width: 256px;">
            <div>
                <div class="d-flex align-items-center gap-2 mb-4 px-2">
                    <div class="bg-primary text-white rounded-3 p-2 d-flex align-items-center justify-content-center me-2 shadow-sm" style="width: 40px; height: 40px;">
                        <i class="bi bi-heart-pulse-fill fs-5"></i>
                    </div>
                    <span class="fs-5 fw-bold text-dark" style="letter-spacing: -0.5px;">PUP Care</span>
                </div>

                <nav class="d-flex flex-column gap-1">
                    <a href="{{ route('patient.dashboard', $patient_id) }}" class="{{ request()->routeIs('patient.dashboard') ? 'd-flex align-items-center gap-2 text-decoration-none px-3 py-2 rounded text-primary bg-primary bg-opacity-10 fw-semibold transition-all' : 'nav-link-custom d-flex align-items-center gap-2 text-decoration-none px-3 py-2 rounded fw-medium transition-all' }}">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"></path></svg>
                        <span class="small">Home</span>
                    </a>
                    <a href="{{ route('patient.appointment', $patient_id) }}" class="{{ request()->routeIs('patient.appointment') ? 'd-flex align-items-center gap-2 text-decoration-none px-3 py-2 rounded text-primary bg-primary bg-opacity-10 fw-semibold transition-all' : 'nav-link-custom d-flex align-items-center gap-2 text-decoration-none px-3 py-2 rounded fw-medium transition-all' }}">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M 12 4 V 20 M 4 12 H 20"></path></svg>
                        <span class="small">Set Appointment</span>
                    </a>
                    <a href="{{ route('patient.records', $patient_id) }}" class="{{ request()->routeIs('patient.records') ? 'd-flex align-items-center gap-2 text-decoration-none px-3 py-2 rounded text-primary bg-primary bg-opacity-10 fw-semibold transition-all' : 'nav-link-custom d-flex align-items-center gap-2 text-decoration-none px-3 py-2 rounded fw-medium transition-all' }}">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <span class="small">My Medical Records</span>
                    </a>
                    <a href="{{ route('patient.prescriptions', $patient_id) }}" class="{{ request()->routeIs('patient.prescriptions') ? 'd-flex align-items-center gap-2 text-decoration-none px-3 py-2 rounded text-primary bg-primary bg-opacity-10 fw-semibold transition-all' : 'nav-link-custom d-flex align-items-center gap-2 text-decoration-none px-3 py-2 rounded fw-medium transition-all' }}">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span class="small">My Prescriptions</span>
                    </a>
                    <a href="{{ route('profile.settings') }}" class="{{ request()->routeIs('profile.settings') ? 'd-flex align-items-center gap-2 text-decoration-none px-3 py-2 rounded text-primary bg-primary bg-opacity-10 fw-semibold transition-all' : 'nav-link-custom d-flex align-items-center gap-2 text-decoration-none px-3 py-2 rounded fw-medium transition-all' }}">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span class="small">Profile Settings</span>
                    </a>
                </nav>
            </div>

            <div class="d-flex flex-column gap-2">
                <a href="{{ route('patient.review', $patient_id) }}" class="{{ request()->routeIs('patient.review') ? 'btn btn-primary btn-sm rounded-3 py-2 fw-semibold d-flex align-items-center justify-content-center gap-2 mb-2' : 'btn btn-outline-primary btn-sm rounded-3 py-2 fw-semibold d-flex align-items-center justify-content-center gap-2 mb-2' }}" style="font-size: 0.8rem;">
                    <i class="bi bi-star"></i> Give a review
                </a>
                
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link text-danger border-0 bg-transparent px-3 py-1.5 d-flex align-items-center gap-2 fw-medium w-100 text-start transition-all rounded-3" style="font-size: 0.88rem; transition: background-color 0.2s;">
                        <i class="bi bi-box-arrow-right"></i> Log out
                    </button>
                </form>
            </div>
        </aside>

        <div class="flex-grow-1 d-flex flex-column h-100 overflow-hidden">
            
            <header class="bg-white border-bottom d-flex align-items-center justify-content-between px-4 px-md-5 flex-shrink-0" style="height: 80px;">
                <div class="position-relative" style="width: 400px;"> </div>
                <div class="d-flex align-items-center gap-4">
                    <a href="{{ route('profile.settings') }}" class="text-decoration-none d-flex align-items-center gap-3 border-start ps-4">
                        @php
                            $patName = Auth::user() ? Auth::user()->name : ($patientName ?? 'Patient');
                            $words = explode(' ', $patName);
                            $initials = '';
                            foreach ($words as $w) {
                                $initials .= isset($w[0]) ? strtoupper($w[0]) : '';
                            }
                            $initials = substr($initials, 0, 2);
                        @endphp
                        <div class="text-end">
                            <p class="mb-0 small fw-bold text-dark lh-1">{{ $patName }}</p>
                            <p class="mb-0 text-muted fw-medium" style="font-size: 12px;">Patient</p>
                        </div>
                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold shadow-sm" style="width: 40px; height: 40px; font-size: 14px;">
                            {{ $initials }}
                        </div>
                    </a>
                </div>
            </header>

            <main class="flex-grow-1 overflow-auto p-4 p-md-5">
                @yield('content')
            </main>
        </div>
    </div>

    <style>
        .transition-all {
            transition: all 0.2s ease-in-out;
        }

        .nav-link-custom {
            color: #94a3b8;
        }
        .nav-link-custom:hover {
            background-color: #f8fafc;
            color: #334155;
        }

        .text-muted {
            color: #94a3b8 !important;
        }

        tbody tr.border-bottom {
            border-color: #f8fafc !important;
        }
    </style>
    @yield('scripts')
</body>
</html>
