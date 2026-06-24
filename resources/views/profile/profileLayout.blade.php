<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PUP Care - @yield('title', 'Profile')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="antialiased">

    {{-- Change the role to doctor then proceed to the ProfileController to uncomment the doctor info --}}

    @php
    $authUser = (object) [
        'name' => 'Juan dela Cruz',
        'role' => 'patient',
    ];
    @endphp

    <div class="d-flex vh-100 overflow-hidden">
        
        <!-- Sidebar Navigation -->
        <aside class="bg-white border-end p-4 d-flex flex-column justify-content-between h-100 flex-shrink-0" style="width: 256px;">
            <div>
                <!-- Logo -->
                <div class="d-flex align-items-center gap-2 mb-4 px-2">
                    <div class="bg-primary text-white p-2 rounded shadow-sm d-flex">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <span class="fs-5 fw-bold text-dark" style="letter-spacing: -0.5px;">PUP Care</span>
                </div>

                <!-- Navigation Menu -->
                <nav class="d-flex flex-column gap-1">
                    @if($authUser->role === 'patient')
                        <a href="/patient/dashboard" class="nav-link-custom d-flex align-items-center gap-2 text-decoration-none px-3 py-2 rounded fw-medium transition-all">
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"></path></svg>
                            <span class="small">Home</span>
                        </a>
                        <a href="/patient/set-appointment" class="nav-link-custom d-flex align-items-center gap-2 text-decoration-none px-3 py-2 rounded fw-medium transition-all">
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M 12 4 V 20 M 4 12 H 20"></path></svg>
                            <span class="small">Set Appointment</span>
                        </a>
                        <a href="/patient/records" class="nav-link-custom d-flex align-items-center gap-2 text-decoration-none px-3 py-2 rounded fw-medium transition-all">
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            <span class="small">My Medical Records</span>
                        </a>
                        <a href="/patient/prescriptions" class="nav-link-custom d-flex align-items-center gap-2 text-decoration-none px-3 py-2 rounded fw-medium transition-all">
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            <span class="small">My Prescriptions</span>
                        </a>
                    @elseif($authUser->role === 'doctor')
                        <a href="/doctor/dashboard" class="nav-link-custom d-flex align-items-center gap-2 text-decoration-none px-3 py-2 rounded fw-medium transition-all">
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"></path></svg>
                            <span class="small">Home</span>
                        </a>
                        <a href="/doctor/patients" class="nav-link-custom d-flex align-items-center gap-2 text-decoration-none px-3 py-2 rounded fw-medium transition-all">
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            <span class="small">My Patients</span>
                        </a>
                        <a href="/doctor/appointments" class="nav-link-custom d-flex align-items-center gap-2 text-decoration-none px-3 py-2 rounded fw-medium transition-all">
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M 12 4 V 20 M 4 12 H 20"></path></svg>
                            <span class="small">My Appointments</span>
                        </a>
                    @elseif($authUser->role === 'admin')
                        <a href="/admin/dashboard" class="nav-link-custom d-flex align-items-center gap-2 text-decoration-none px-3 py-2 rounded fw-medium transition-all">
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"></path></svg>
                            <span class="small">Dashboard</span>
                        </a>
                        <a href="/admin/doctors" class="nav-link-custom d-flex align-items-center gap-2 text-decoration-none px-3 py-2 rounded fw-medium transition-all">
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            <span class="small">Doctors</span>
                        </a>
                        <a href="/admin/patients" class="nav-link-custom d-flex align-items-center gap-2 text-decoration-none px-3 py-2 rounded fw-medium transition-all">
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            <span class="small">Patients</span>
                        </a>
                    @endif

                    <a href="/profile/settings" class="d-flex align-items-center gap-2 text-decoration-none px-3 py-2 rounded text-primary bg-primary bg-opacity-10 fw-semibold transition-all">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span class="small">Profile Settings</span>
                    </a>
                </nav>
            </div>

            <!-- Logout -->
            <div>
                <a href="#" class="logout-link d-flex align-items-center gap-2 text-decoration-none px-3 py-2 rounded fw-medium transition-all">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    <span class="small">Log out</span>
                </a>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-grow-1 d-flex flex-column h-100 overflow-hidden">
            
            <!-- Header -->
            <header class="bg-white border-bottom d-flex align-items-center justify-content-between px-4 px-md-5 flex-shrink-0" style="height: 80px;">
                
                <!-- Search Bar -->
                <div class="position-relative" style="width: 384px;">
                    <span class="position-absolute top-50 start-0 translate-middle-y ms-3 text-muted d-flex">
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </span>
                    <input type="text" placeholder="Search" class="form-control rounded-pill border-0 ps-5 py-2 search-input shadow-none transition-all" style="background-color: #f4f7fc; font-size: 0.875rem;">
                </div>

                <!-- User Info -->
                <div class="d-flex align-items-center gap-3 border-start ps-4">
                    <div class="text-end">
                        <p class="mb-0 small fw-bold text-dark lh-1">{{ $authUser->name }}</p>
                        <p class="mb-0 text-muted fw-medium" style="font-size: 12px;">{{ ucfirst($authUser->role) }}</p>
                    </div>
                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold shadow-sm" style="width: 40px; height: 40px;">
                        {{ strtoupper(substr($authUser->name, 0, 1)) }}{{ strtoupper(substr($authUser->name, strpos($authUser->name, ' ') + 1, 1)) ?? '' }}
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-grow-1 overflow-auto p-4 p-md-5">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>