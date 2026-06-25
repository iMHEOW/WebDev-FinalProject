<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PUP Care Portal</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

    <div class="d-flex" style="height: 100vh; overflow: hidden;">
        
        <aside class="bg-white border-end p-4 d-flex flex-column justify-content-between h-100" style="width: 260px; flex-shrink: 0;">
            <div>
                <div class="d-flex align-items-center mb-4 px-2">
                    <div class="bg-primary text-white rounded-3 p-2 d-flex align-items-center justify-content-center me-2 shadow-sm" style="width: 40px; height: 40px;">
                        <i class="bi bi-heart-pulse-fill fs-5"></i>
                    </div>
                    <span class="fs-5 fw-bold text-dark">PUP Care</span>
                </div>

                <nav class="nav flex-column gap-1">
                    <p class="text-uppercase text-muted fw-bold mb-2 px-3" style="font-size: 10px; letter-spacing: 0.5px;">Navigation Menu</p>
                    
                    <a href="{{ route('admin.dashboard') }}" class="nav-link rounded-3 px-3 py-2.5 small {{ request()->routeIs('admin.dashboard') ? 'nav-link-active' : 'nav-link-custom' }}">
                        <i class="bi bi-grid-1x2-fill me-2"></i> Dashboard
                    </a>

                    <a href="{{ route('admin.patients') }}" class="nav-link rounded-3 px-3 py-2.5 small {{ request()->routeIs('admin.patients') ? 'nav-link-active' : 'nav-link-custom' }}">
                        <i class="bi bi-people-fill me-2"></i> Patients
                    </a>

                    <a href="{{ route('admin.doctors') }}" class="nav-link rounded-3 px-3 py-2.5 small {{ request()->routeIs('admin.doctors') ? 'nav-link-active' : 'nav-link-custom' }}">
                        <i class="bi bi-person-fill me-2"></i> Doctors
                    </a>

                    <a href="{{ route('admin.appointments') }}" class="nav-link rounded-3 px-3 py-2.5 small {{ request()->routeIs('admin.appointments') ? 'nav-link-active' : 'nav-link-custom' }}">
                        <i class="bi bi-file-earmark-text-fill me-2"></i> Appointments
                    </a>

                    <a href="{{ route('admin.tickets') }}" class="nav-link rounded-3 px-3 py-2.5 small {{ request()->routeIs('admin.tickets') ? 'nav-link-active' : 'nav-link-custom' }}">
                        <i class="bi bi-ticket-detailed-fill me-2"></i> Ticket Reports
                    </a>
                </nav>
            </div>

            <div>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="nav-link rounded-3 px-3 py-2.5 small nav-link-logout border-0 bg-transparent text-start w-100">
                        <i class="bi bi-box-arrow-right me-2"></i> Log out
                    </button>
                </form>
            </div>
        </aside>

        <div class="flex-grow-1 d-flex flex-column h-100" style="overflow: hidden;">
            
            <header class="bg-white border-bottom h-20 px-4 d-flex align-items-center justify-content-between" style="height: 80px; flex-shrink: 0;">
                <div class="input-group" style="width: 350px;">
                    
                </div>

                <div class="d-flex align-items-center gap-3">
                    <div class="text-end">
                        <p class="mb-0 fw-bold text-dark small">Admin 1</p>
                        <p class="mb-0 text-muted small" style="font-size: 11px;">Admin</p>
                    </div>
                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold shadow-sm" style="width: 40px; height: 40px; font-size: 14px;">
                        AD
                    </div>
                </div>
            </header>

            <main class="flex-grow-1 p-4 bg-light" style="overflow-y: auto;">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>

<style>
    body {
        background-color: #f0f4fa;
        color: #475569;
    }
    .hospital-card {
        background-color: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 24px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.02);
    }
    .btn-blue {
        background-color: #2563eb;
        color: #ffffff;
        font-weight: 600;
        padding: 10px 20px;
        border-radius: 12px;
        text-align: center;
        display: inline-block;
        text-decoration: none;
        border: none;
    }
    .btn-blue:hover {
        background-color: #1d4ed8;
        color: #ffffff;
    }
    .nav-link-custom {
        color: #64748b !important;
        font-weight: 500;
        transition: all 0.2s ease-in-out;
    }
    .nav-link-custom:hover {
        background-color: #f0f4ff !important;
        color: #0f5cfd !important;
    }
    .nav-link-active {
        background-color: #f0f4ff !important;
        color: #0f5cfd !important;
        font-weight: 600 !important;
    }
    .nav-link-logout {
        color: #64748b !important;
        font-weight: 500;
        transition: all 0.2s ease-in-out;
    }
    .nav-link-logout:hover {
        background-color: #fff1f2 !important;
        color: #f43e5d !important;
    }
</style>