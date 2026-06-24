<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PUP Care - Doctor Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="antialiased">

    <div class="d-flex vh-100 overflow-hidden">
        
        <aside class="bg-white border-end p-4 d-flex flex-column justify-content-between h-100 flex-shrink-0" style="width: 256px;">
            <div>
                <div class="d-flex align-items-center gap-2 mb-4 px-2">
                    <div class="bg-primary text-white p-2 rounded shadow-sm d-flex">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <span class="fs-5 fw-bold text-dark" style="letter-spacing: -0.5px;">PUP Care</span>
                </div>

                <nav class="d-flex flex-column gap-1">
                    <a href="/doctor/dashboard" class="d-flex align-items-center gap-2 text-decoration-none px-3 py-2 rounded text-primary bg-primary bg-opacity-10 fw-semibold transition-all">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"></path></svg>
                        <span class="small">Dashboard</span>
                    </a>
                    <a href="/doctor/patients" class="nav-link-custom d-flex align-items-center gap-2 text-decoration-none px-3 py-2 rounded fw-medium transition-all">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <span class="small">Patients</span>
                    </a>
                    <a href="#" class="nav-link-custom d-flex align-items-center gap-2 text-decoration-none px-3 py-2 rounded fw-medium transition-all">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span class="small">Appointment</span>
                    </a>
                    <a href="#" class="nav-link-custom d-flex align-items-center gap-2 text-decoration-none px-3 py-2 rounded fw-medium transition-all">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span class="small">Lab Reports</span>
                    </a>
                </nav>
            </div>

            <div>
                <a href="#" class="logout-link d-flex align-items-center gap-2 text-decoration-none px-3 py-2 rounded fw-medium transition-all">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    <span class="small">Log out</span>
                </a>
            </div>
        </aside>

        <div class="flex-grow-1 d-flex flex-column h-100 overflow-hidden">
            
            <header class="bg-white border-bottom d-flex align-items-center justify-content-between px-4 px-md-5 flex-shrink-0" style="height: 80px;">
                
                <div class="position-relative" style="width: 384px;">
                    <span class="position-absolute top-50 start-0 translate-middle-y ms-3 text-muted d-flex">
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </span>
                    <input type="text" placeholder="Search" class="form-control rounded-pill border-0 ps-5 py-2 search-input shadow-none transition-all" style="background-color: #f4f7fc; font-size: 0.875rem;">
                </div>

                <div class="d-flex align-items-center gap-4">
                    <button class="btn btn-link text-secondary p-0 position-relative text-decoration-none icon-hover">
                        <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-white rounded-circle"></span>
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    </button>
                   
                    <div class="d-flex align-items-center gap-3 border-start ps-4">
                        <div class="text-end">
                            <p class="mb-0 small fw-bold text-dark lh-1">Dr. AJ</p>
                            <p class="mb-0 text-muted fw-medium" style="font-size: 12px;">Cardiologist</p>
                        </div>
                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold shadow-sm" style="width: 40px; height: 40px;">
                            DS
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-grow-1 overflow-auto p-4 p-md-5">
                
                <div class="row g-4">
                    
                    <div class="col-12 col-lg-8">
                        <div class="hospital-card d-flex flex-column h-100" style="min-height: 480px;">
                            <div>
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h4 class="fw-bold text-dark mb-0 fs-5" style="letter-spacing: -0.5px;">Upcoming Appointments</h4>
                                    <span class="text-muted fw-semibold" style="font-size: 12px;">Sorted by Date</span>
                                </div>
                                
                                <div class="table-responsive">
                                    <table class="table table-borderless align-middle mb-0">
                                        <thead>
                                            <tr class="border-bottom text-uppercase text-muted" style="font-size: 12px;">
                                                <th class="pb-3 fw-semibold px-0">Patient</th>
                                                <th class="pb-3 fw-semibold">Date</th>
                                                <th class="pb-3 fw-semibold">Time</th>
                                                <th class="pb-3 fw-semibold">Type</th>
                                                <th class="pb-3 fw-semibold text-end px-0">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-dark fw-medium" style="font-size: 14px;">
                                            <tr class="border-bottom">
                                                <td class="py-3 px-0 fw-bold">123</td>
                                                <td class="py-3 text-secondary">June 16, 2026</td>
                                                <td class="py-3 text-primary">09:40 AM</td>
                                                <td class="py-3">
                                                    <span class="badge badge-indigo px-2 py-1 rounded">Teleconsult</span>
                                                </td>
                                                <td class="py-3 px-0 text-end">
                                                    <a href="/doctor/consultation" class="text-decoration-none btn-start">Start</a>
                                                </td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <td class="py-3 px-0 fw-bold">Juan Dela Cruz</td>
                                                <td class="py-3 text-secondary">June 16, 2026</td>
                                                <td class="py-3 text-primary">10:00 AM</td>
                                                <td class="py-3">
                                                    <span class="badge badge-emerald px-2 py-1 rounded">F2F</span>
                                                </td>
                                                <td class="py-3 px-0 text-end">
                                                    <a href="/doctor/consultation" class="text-decoration-none btn-start">Start</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="py-3 px-0 fw-bold">Ako</td>
                                                <td class="py-3 text-secondary">June 17, 2026</td>
                                                <td class="py-3 text-primary">02:30 PM</td>
                                                <td class="py-3">
                                                    <span class="badge badge-indigo px-2 py-1 rounded">Teleconsult</span>
                                                </td>
                                                <td class="py-3 px-0 text-end">
                                                    <a href="/doctor/consultation" class="text-decoration-none btn-start">Start</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4">
                        <div class="hospital-card d-flex flex-column justify-content-between h-100">
                            <div>
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h4 class="fw-bold text-dark mb-0 fs-5" style="letter-spacing: -0.5px;">Pending Tasks</h4>
                                    <span class="badge badge-amber rounded-pill px-2 py-1">3 Left</span>
                                </div>

                                <div class="d-flex flex-column gap-3">
                                    <div class="d-flex align-items-start gap-3 p-3 rounded bg-light border border-light-subtle">
                                        <div class="mt-1 fs-6">📌</div>
                                        <div>
                                            <p class="mb-0 small fw-bold text-dark">Follow up patient</p>
                                            <p class="mb-0 text-muted mt-1" style="font-size: 13px;">Check recovery status of post-op cases.</p>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-start gap-3 p-3 rounded bg-light border border-light-subtle">
                                        <div class="mt-1 fs-6">💊</div>
                                        <div>
                                            <p class="mb-0 small fw-bold text-dark">Prescription Renewal</p>
                                            <p class="mb-0 text-muted mt-1" style="font-size: 13px;">Approve maintenance medication extensions.</p>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-start gap-3 p-3 rounded bg-light border border-light-subtle">
                                        <div class="mt-1 fs-6">📝</div>
                                        <div>
                                            <p class="mb-0 small fw-bold text-dark">Unfinished doctor's notes</p>
                                            <p class="mb-0 text-muted mt-1" style="font-size: 13px;">Complete diagnostics write-ups from yesterday.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-4 mt-4 border-top">
                                <a href="/doctor/patients" class="btn-blue w-100 d-block">
                                    Manage Patient Directory
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<style>
    /* Base Overrides */
    body {
        background-color: #f0f4fa;
        color: #475569;
        font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", "Noto Sans", "Liberation Sans", Arial, sans-serif;
    }

    .transition-all {
        transition: all 0.2s ease-in-out;
    }

    /* Sidebar Navigation Hovers */
    .nav-link-custom {
        color: #94a3b8; 
    }
    .nav-link-custom:hover {
        background-color: #f8fafc; 
        color: #334155; 
    }

    .logout-link {
        color: #94a3b8; 
    }
    .logout-link:hover {
        background-color: #fff1f2; 
        color: #e11d48; 
    }

    /* Header Interactions */
    .search-input:focus {
        background-color: #ffffff !important;
        border-color: #e2e8f0;
        box-shadow: 0 0 0 1px #e2e8f0;
    }
    
    .icon-hover {
        color: #94a3b8 !important;
    }
    .icon-hover:hover {
        color: #475569 !important;
    }

    /* Shared Card Style */
    .hospital-card {
        background-color: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 24px;
    }

    /* Custom Badges matching Tailwind colors */
    .badge-indigo {
        background-color: #eef2ff;
        color: #4f46e5;
    }
    .badge-emerald {
        background-color: #ecfdf5;
        color: #059669;
    }
    .badge-amber {
        background-color: #fef3c7;
        color: #92400e;
        font-weight: 700;
    }

    /* Action Links */
    .btn-start {
        font-size: 12px;
        font-weight: 700;
        background-color: #eff6ff;
        color: #2563eb;
        padding: 6px 12px;
        border-radius: 8px;
        transition: background-color 0.2s;
    }
    .btn-start:hover {
        background-color: #dbeafe;
        color: #2563eb;
    }

    /* Buttons */
    .btn-blue {
        background-color: #2563eb;
        color: #ffffff;
        font-weight: 600;
        padding: 12px 24px;
        border-radius: 12px;
        text-align: center;
        text-decoration: none;
        transition: background-color 0.2s;
    }

    .btn-blue:hover {
        background-color: #1d4ed8;
        color: #ffffff;
    }

    /* Custom text-muted to match your exact hex */
    .text-muted {
        color: #94a3b8 !important; 
    }
    
    /* Table row subtle border override */
    tbody tr.border-bottom {
        border-color: #f8fafc !important;
    }
</style><?php /**PATH C:\Users\HP\Documents\Visual Studio Projects\webdev_patient\resources\views/doctor/dashboard.blade.php ENDPATH**/ ?>