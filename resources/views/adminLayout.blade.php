<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PUP Care - @yield('title', 'Portal')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-light">

    <div class="d-flex vh-100 overflow-hidden">
        
        <aside class="bg-white border-end d-flex flex-column justify-content-between h-100 flex-shrink-0" style="width: 256px; border-color: #f1f5f9 !important; padding: 24px;">
            <div>

                <div class="d-flex align-items-center gap-3 px-2 mb-4">
                    <div class="bg-primary text-white p-2 rounded-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; box-shadow: 0 8px 16px rgba(15, 92, 253, 0.25);">
                        <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <span class="fs-5 fw-bold text-dark" style="letter-spacing: -0.5px;">PUP Care</span>
                </div>

                <nav class="d-flex flex-column gap-1">
                    <p class="fw-bold text-muted text-uppercase px-3 mb-2" style="font-size: 10px; letter-spacing: 0.5px;">Navigation Menu</p>
                    
                    <a href="#" class="d-flex align-items-center gap-3 px-3 py-2.5 rounded-3 text-decoration-none fw-semibold" style="background-color: #f0f4ff; color: #0f5cfd; font-size: 0.9rem;">
                        <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"></path></svg>
                        <span>Active Dashboard</span>
                    </a>

                    <a href="#" class="d-flex align-items-center gap-3 px-3 py-2.5 rounded-3 text-decoration-none fw-semibold nav-link-custom" style="font-size: 0.9rem; transition: all 0.2s;">
                        <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <span>Secondary Tab</span>
                    </a>
                </nav>
            </div>

            <div>
                <a href="#" class="d-flex align-items-center gap-3 px-3 py-2.5 rounded-3 text-decoration-none fw-semibold nav-link-logout" style="font-size: 0.9rem; transition: all 0.2s;">
                    <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    <span>Log out</span>
                </a>
            </div>
        </aside>

        <div class="flex-grow-1 d-flex flex-column h-100 overflow-hidden">
            
            <header class="bg-white border-bottom d-flex align-items-center justify-content-between px-4 flex-shrink-0" style="height: 80px; border-color: #f1f5f9 !important;">
                <div class="position-relative" style="width: 384px; max-width: 100%;">
                    <span class="position-absolute top-0 bottom-0 start-0 d-flex align-items-center ps-3 text-muted">
                        <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </span>
                    <input type="text" placeholder="Search portal metrics..." class="w-100 ps-5 pe-3 py-2 rounded-pill search-input" style="background-color: #f4f7fc; font-size: 0.9rem; outline: none;">
                </div>

                <div class="d-flex align-items-center gap-4">
               
                    <button class="position-relative btn-notification">
                        <span class="position-absolute bg-danger rounded-circle border border-white" style="top: 0; right: 0; width: 8px; height: 8px;"></span>
                        <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    </button>
              
                    <div class="d-flex align-items-center gap-2 small fw-semibold text-dark">
                        <div class="rounded-1 d-flex align-items-center justify-content-center text-secondary fw-bold" style="width: 24px; height: 16px; background-color: #e2e8f0; font-size: 8px;">PH</div>
                        <span>English</span>
                    </div>
                
                    <div class="d-flex align-items-center gap-3 border-start ps-4" style="border-color: #f1f5f9 !important;">
                        <div class="text-end">
                            <p class="small fw-bold text-dark mb-0">User Account</p>
                            <p class="text-muted mb-0" style="font-size: 0.75rem; font-weight: 500;">Assigned Portal Role</p>
                        </div>
                        <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center text-white fw-bold shadow-sm" style="width: 40px; height: 40px;">
                            UA
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-grow-1 overflow-y-auto" style="padding: 40px;">
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
    }

    .btn-blue {
        background-color: #2563eb;
        color: #ffffff;
        font-weight: 600;
        padding: 12px 24px;
        border-radius: 12px;
        text-align: center;
        display: inline-block;
        text-decoration: none;
        transition: background-color 0.2s;
    }

    .btn-blue:hover {
        background-color: #1d4ed8;
    }

    .text-muted {
        color: #94a3b8;
        font-size: 12px;
    }

    .nav-link-custom {
        color: #8f9ca9 !important;
    }
    .nav-link-custom:hover {
        background-color: #f8f9fa;
        color: #212529 !important;
    }
    .nav-link-logout {
        color: #8f9ca9 !important;
    }
    .nav-link-logout:hover {
        background-color: #fff1f2;
        color: #e11d48 !important;
    }
    .btn-notification {
        color: #8f9ca9;
        background: none;
        border: none;
        padding: 0;
        transition: color 0.2s;
    }
    .btn-notification:hover {
        color: #475569;
    }
    .search-input {
        border: 1px solid transparent;
        transition: all 0.2s;
      }
    .search-input:focus {
        background-color: #ffffff !important;
        border-color: #cbd5e1 !important;
    }
</style>