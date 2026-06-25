<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PUP Care Portal - @yield('title', 'Dashboard')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        body { background-color: #f0f4fa; color: #475569; }
        .sidebar { width: 260px; flex-shrink: 0; background: #ffffff; border-right: 1px solid #e2e8f0; }
        .hospital-card { background-color: #ffffff; border: 1px solid #e2e8f0; border-radius: 16px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02); }
        .nav-link { color: #64748b; font-weight: 500; }
        .nav-link.active { color: #0d6efd !important; font-weight: 700; background-color: #e7f1ff; }
    </style>
</head>
<body>

    <div class="d-flex" style="height: 100vh; overflow: hidden;">
        
        <aside class="sidebar p-4 d-flex flex-column justify-content-between h-100">
            <div>
                <div class="d-flex align-items-center mb-4 px-2">
                    <div class="bg-primary text-white rounded-3 p-2 d-flex align-items-center justify-content-center me-2 shadow-sm" style="width: 40px; height: 40px;">
                        <i class="bi bi-heart-pulse-fill fs-5"></i>
                    </div>
                    <span class="fs-5 fw-bold text-dark">PUP Care</span>
                </div>

                <nav class="nav flex-column gap-1">
                    <p class="text-uppercase text-muted fw-bold mb-2 px-3" style="font-size: 10px; letter-spacing: 0.5px;">Navigation Menu</p>
                    
                    <a href="/doctor/dashboard" class="nav-link rounded-3 px-3 py-2.5 {{ request()->is('doctor/dashboard') ? 'active' : '' }}">
                        <i class="bi bi-grid-1x2-fill me-2"></i> Dashboard
                    </a>

                    <a href="/doctor/directory" class="nav-link rounded-3 px-3 py-2.5 {{ request()->is('doctor/directory') ? 'active' : '' }}">
                        <i class="bi bi-people-fill me-2"></i> Patient Directory
                    </a>

                    <a href="/doctor/consultation" class="nav-link rounded-3 px-3 py-2.5 {{ request()->is('doctor/consultation') ? 'active' : '' }}">
                        <i class="bi bi-file-earmark-text-fill me-2"></i> Consultation Form
                    </a>
                </nav>
            </div>

            <div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-link text-danger">Log out</button>
                </form>
            </div>
        </aside>

        <div class="flex-grow-1 d-flex flex-column h-100" style="overflow: hidden;">
            <header class="bg-white border-bottom h-20 px-4 d-flex align-items-center justify-content-between" style="height: 80px; flex-shrink: 0;">
                <div class="input-group" style="width: 350px;">
                    <span class="input-group-text bg-light border-0 text-muted rounded-start-pill ps-3"><i class="bi bi-search"></i></span>
                    <input type="text" placeholder="Search portal metrics..." class="form-control bg-light border-0 rounded-end-pill py-2">
                </div>
                <div class="d-flex align-items-center gap-3">
                    <div class="text-end">
                        <p class="mb-0 fw-bold text-dark small">Dr. Shanto</p>
                        <p class="mb-0 text-muted small" style="font-size: 11px;">Cardiologist</p>
                    </div>
                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold shadow-sm" style="width: 40px; height: 40px; font-size: 14px;">
                        DS
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