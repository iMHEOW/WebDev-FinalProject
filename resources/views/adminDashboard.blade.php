@extends('common.main')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-5 pb-3">
    <!-- Search Bar -->
    <div class="input-group" style="max-width: 320px;">
        <span class="input-group-text bg-white border-0 ps-3 pe-2 text-muted rounded-start-pill">
            <i class="bi bi-search"></i>
        </span>
        <input type="text" class="form-control border-0 ps-1 rounded-end-pill" placeholder="Search" style="box-shadow: none; background-color: #fff; font-size: 0.95rem;">
    </div>

    <!-- Admin Profile & Notifications -->
    <div class="d-flex align-items-center gap-4">
        <!-- Notification Icon -->
        <div class="position-relative cursor-pointer d-flex align-items-center justify-content-center rounded-circle" style="width: 40px; height: 40px; background-color: #fff; box-shadow: 0 4px 12px rgba(0,0,0,0.02);">
            <i class="bi bi-bell text-primary fs-5"></i>
            <span class="position-absolute p-1 bg-danger border border-light rounded-circle" style="top: 10px; right: 10px;"></span>
        </div>
        
        <!-- User Profile -->
        <div class="d-flex align-items-center gap-3">
            <div class="text-end">
                <h6 class="mb-0 fw-bold text-dark" style="font-size: 0.95rem;">Eujen</h6>
                <small class="text-muted" style="font-size: 0.8rem;">Admin</small>
            </div>
            <img src="#" alt="Admin Avatar" class="rounded-circle shadow-sm" style="width: 44px; height: 44px; object-fit: cover;">
        </div>
    </div>
</div>

<!-- Metrics Cards Row -->
<div class="row g-4 mb-5">
    <!-- Card 1: Total Doctors (Active Blue) -->
    <div class="col-md-6 col-xl-3">
        <div class="card border-0 text-white rounded-4 p-4 shadow-sm" style="background: linear-gradient(135deg, #0f5cfd 0%, #0046d5 100%);">
            <div class="d-flex align-items-center gap-2 mb-3 opacity-90">
                <i class="bi bi-person-fill fs-5"></i>
                <span class="fw-semibold" style="font-size: 0.9rem;">Total Doctors</span>
            </div>
            <h2 class="fw-bold mb-3" style="font-size: 2.2rem; letter-spacing: -1px;">10</h2>
            <div class="d-flex align-items-center gap-2 fs-7 opacity-85">
                <i class="bi bi-graph-up"></i>
                <span>2 Doctors joined this week</span>
            </div>
        </div>
    </div>
    
    <!-- Card 2: Total Patient -->
    <div class="col-md-6 col-xl-3">
        <div class="card border-0 bg-white rounded-4 p-4 shadow-sm">
            <div class="d-flex align-items-center gap-2 mb-3 text-secondary">
                <i class="bi bi-activity fs-5 text-primary"></i>
                <span class="fw-semibold" style="font-size: 0.9rem;">Total Patient</span>
            </div>
            <h2 class="fw-bold mb-3 text-dark" style="font-size: 2.2rem; letter-spacing: -1px;">1,234</h2>
            <div class="d-flex align-items-center gap-2 fs-7 text-success fw-semibold">
                <i class="bi bi-arrow-up-short fs-5"></i>
                <span>1.3% Up from past week</span>
            </div>
        </div>
    </div>

    <!-- Card 3: Total Transaction -->
    <div class="col-md-6 col-xl-3">
        <div class="card border-0 bg-white rounded-4 p-4 shadow-sm">
            <div class="d-flex align-items-center gap-2 mb-3 text-secondary">
                <i class="bi bi-wallet2 fs-5 text-primary"></i>
                <span class="fw-semibold" style="font-size: 0.9rem;">Total Transaction</span>
            </div>
            <h2 class="fw-bold mb-3 text-dark" style="font-size: 2.2rem; letter-spacing: -1px;">PHP10,000</h2>
            <div class="d-flex align-items-center gap-2 fs-7 text-danger fw-semibold">
                <i class="bi bi-arrow-down-short fs-5"></i>
                <span>4.3% Down from yesterday</span>
            </div>
        </div>
    </div>

    <!-- Card 4: Total Appointment -->
    <div class="col-md-6 col-xl-3">
        <div class="card border-0 bg-white rounded-4 p-4 shadow-sm">
            <div class="d-flex align-items-center gap-2 mb-3 text-secondary">
                <i class="bi bi-calendar-check fs-5 text-primary"></i>
                <span class="fw-semibold" style="font-size: 0.9rem;">Total Appointment</span>
            </div>
            <h2 class="fw-bold mb-3 text-dark" style="font-size: 2.2rem; letter-spacing: -1px;">350</h2>
            <div class="d-flex align-items-center gap-2 fs-7 text-success fw-semibold">
                <i class="bi bi-arrow-up-short fs-5"></i>
                <span>1.8% Up from yesterday</span>
            </div>
        </div>
    </div>
</div>

<!-- Main Grid Row (Appointments & Room Availability) -->
<div class="row g-4 mb-5">
    <!-- Appointment List Card -->
    <div class="col-lg-7">
        <div class="card border-0 bg-white rounded-4 p-4 shadow-sm h-100">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="fw-bold mb-0 text-dark" style="font-size: 1.15rem;">Appointment</h5>
                <a href="#" class="text-primary text-decoration-none fw-semibold" style="font-size: 0.85rem;">View all</a>
            </div>
            
            <div class="d-flex flex-column gap-3">
                <!-- Doc 1 -->
                <div class="d-flex justify-content-between align-items-center pb-3 border-bottom border-light">
                    <div class="d-flex align-items-center gap-3">
                        <img src="#" class="rounded-circle" style="width: 44px; height: 44px; object-fit: cover;">
                        <div>
                            <h6 class="mb-0 fw-bold text-dark" style="font-size: 0.95rem;">Dr Mamun</h6>
                            <small class="text-muted" style="font-size: 0.8rem;">Psychiatrist</small>
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="fw-bold text-dark" style="font-size: 0.9rem;">Today</div>
                        <small class="text-muted" style="font-size: 0.8rem;">09:40</small>
                    </div>
                </div>
                <!-- Doc 2 -->
                <div class="d-flex justify-content-between align-items-center pb-3 border-bottom border-light">
                    <div class="d-flex align-items-center gap-3">
                        <img src="#" class="rounded-circle" style="width: 44px; height: 44px; object-fit: cover;">
                        <div>
                            <h6 class="mb-0 fw-bold text-dark" style="font-size: 0.95rem;">Dr Rebecca</h6>
                            <small class="text-muted" style="font-size: 0.8rem;">Internist</small>
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="fw-bold text-dark" style="font-size: 0.9rem;">Today</div>
                        <small class="text-muted" style="font-size: 0.8rem;">10:00</small>
                    </div>
                </div>
                <!-- Doc 3 -->
                <div class="d-flex justify-content-between align-items-center pb-3 border-bottom border-light">
                    <div class="d-flex align-items-center gap-3">
                        <img src="#" class="rounded-circle" style="width: 44px; height: 44px; object-fit: cover;">
                        <div>
                            <h6 class="mb-0 fw-bold text-dark" style="font-size: 0.95rem;">Dr Emon</h6>
                            <small class="text-muted" style="font-size: 0.8rem;">Ophthalmologist</small>
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="fw-bold text-dark" style="font-size: 0.9rem;">Today</div>
                        <small class="text-muted" style="font-size: 0.8rem;">10:30</small>
                    </div>
                </div>
                <!-- Doc 4 -->
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-3">
                        <img src="#" class="rounded-circle" style="width: 44px; height: 44px; object-fit: cover;">
                        <div>
                            <h6 class="mb-0 fw-bold text-dark" style="font-size: 0.95rem;">Dr Nadia</h6>
                            <small class="text-muted" style="font-size: 0.8rem;">Ophthalmologist</small>
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="fw-bold text-dark" style="font-size: 0.9rem;">Today</div>
                        <small class="text-muted" style="font-size: 0.8rem;">10:30</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Room Availability Card -->
    <div class="col-lg-5">
        <div class="card border-0 bg-white rounded-4 p-4 shadow-sm h-100">
            <h5 class="fw-bold mb-4 text-dark" style="font-size: 1.15rem;">Room Availability</h5>
            <div class="d-flex flex-column gap-3.5">
                <!-- General Ward -->
                <div class="d-flex align-items-center justify-content-between py-2 border-bottom border-light">
                    <div class="d-flex align-items-center gap-3">
                        <span class="rounded-circle" style="width: 12px; height: 12px; background-color: #a855f7; display: inline-block;"></span>
                        <span class="fw-semibold text-secondary" style="font-size: 0.92rem;">General Ward</span>
                    </div>
                    <span class="fw-bold text-dark" style="font-size: 1rem;">56</span>
                </div>
                <!-- Private Room -->
                <div class="d-flex align-items-center justify-content-between py-2 border-bottom border-light">
                    <div class="d-flex align-items-center gap-3">
                        <span class="rounded-circle" style="width: 12px; height: 12px; background-color: #3b82f6; display: inline-block;"></span>
                        <span class="fw-semibold text-secondary" style="font-size: 0.92rem;">Private Room</span>
                    </div>
                    <span class="fw-bold text-dark" style="font-size: 1rem;">45</span>
                </div>
                <!-- Semi-private Room -->
                <div class="d-flex align-items-center justify-content-between py-2 border-bottom border-light">
                    <div class="d-flex align-items-center gap-3">
                        <span class="rounded-circle" style="width: 12px; height: 12px; background-color: #eab308; display: inline-block;"></span>
                        <span class="fw-semibold text-secondary" style="font-size: 0.92rem;">Semi-private Room</span>
                    </div>
                    <span class="fw-bold text-dark" style="font-size: 1rem;">32</span>
                </div>
                <!-- Emergency Room -->
                <div class="d-flex align-items-center justify-content-between py-2 border-bottom border-light">
                    <div class="d-flex align-items-center gap-3">
                        <span class="rounded-circle" style="width: 12px; height: 12px; background-color: #ef4444; display: inline-block;"></span>
                        <span class="fw-semibold text-secondary" style="font-size: 0.92rem;">Emergency Room</span>
                    </div>
                    <span class="fw-bold text-dark" style="font-size: 1rem;">12</span>
                </div>
                <!-- ICU -->
                <div class="d-flex align-items-center justify-content-between py-2 border-bottom border-light">
                    <div class="d-flex align-items-center gap-3">
                        <span class="rounded-circle" style="width: 12px; height: 12px; background-color: #22c55e; display: inline-block;"></span>
                        <span class="fw-semibold text-secondary" style="font-size: 0.92rem;">ICU</span>
                    </div>
                    <span class="fw-bold text-dark" style="font-size: 1rem;">10</span>
                </div>
                <!-- Operation Theatre -->
                <div class="d-flex align-items-center justify-content-between py-2">
                    <div class="d-flex align-items-center gap-3">
                        <span class="rounded-circle" style="width: 12px; height: 12px; background-color: #f97316; display: inline-block;"></span>
                        <span class="fw-semibold text-secondary" style="font-size: 0.92rem;">Operation Theatre</span>
                    </div>
                    <span class="fw-bold text-dark" style="font-size: 1rem;">4</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Secondary Grid Row (Reports & Doctors List) -->
<div class="row g-4">
    <!-- Reports Card -->
    <div class="col-lg-7">
        <div class="card border-0 bg-white rounded-4 p-4 shadow-sm h-100">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="fw-bold mb-0 text-dark" style="font-size: 1.15rem;">Reports</h5>
                <a href="#" class="text-primary text-decoration-none fw-semibold" style="font-size: 0.85rem;">View all</a>
            </div>
            
            <div class="d-flex flex-column gap-3">
                <!-- Report 1 -->
                <div class="d-flex justify-content-between align-items-center p-3 rounded-4" style="background-color: #f8fafc; border: 1px solid #f1f5f9;">
                    <div class="d-flex align-items-center gap-3">
                        <div class="d-flex align-items-center justify-content-center text-primary rounded-circle" style="width: 40px; height: 40px; background-color: #eef2ff;">
                            <i class="bi bi-tools fs-5"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 fw-bold text-dark" style="font-size: 0.92rem;">A shower broken in room number 135...</h6>
                            <small class="text-muted" style="font-size: 0.8rem;">1 minute ago</small>
                        </div>
                    </div>
                    <a href="#" class="text-primary text-decoration-none fw-bold" style="font-size: 0.85rem;">View Report &rarr;</a>
                </div>
                
                <!-- Report 2 -->
                <div class="d-flex justify-content-between align-items-center p-3 rounded-4" style="background-color: #f8fafc; border: 1px solid #f1f5f9;">
                    <div class="d-flex align-items-center gap-3">
                        <div class="d-flex align-items-center justify-content-center text-primary rounded-circle" style="width: 40px; height: 40px; background-color: #eef2ff;">
                            <i class="bi bi-tools fs-5"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 fw-bold text-dark" style="font-size: 0.92rem;">A shower broken in room number 135...</h6>
                            <small class="text-muted" style="font-size: 0.8rem;">1 minute ago</small>
                        </div>
                    </div>
                    <a href="#" class="text-primary text-decoration-none fw-bold" style="font-size: 0.85rem;">View Report &rarr;</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Doctors List Card -->
    <div class="col-lg-5">
        <div class="card border-0 bg-white rounded-4 p-4 shadow-sm h-100">
            <h5 class="fw-bold mb-4 text-dark" style="font-size: 1.15rem;">Doctors List</h5>
            
            <div class="d-flex flex-column gap-3.5">
                <!-- Doctor 1 -->
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-3">
                        <img src="#" class="rounded-circle shadow-sm" style="width: 40px; height: 40px; object-fit: cover;">
                        <div>
                            <h6 class="mb-0 fw-bold text-dark" style="font-size: 0.92rem;">Dr Mamun</h6>
                            <small class="text-muted" style="font-size: 0.8rem;">Psychiatrist</small>
                        </div>
                    </div>
                    <button class="btn btn-link text-muted p-0" style="box-shadow: none;">
                        <i class="bi bi-three-dots-vertical"></i>
                    </button>
                </div>
                <!-- Doctor 2 -->
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-3">
                        <img src="#" class="rounded-circle shadow-sm" style="width: 40px; height: 40px; object-fit: cover;">
                        <div>
                            <h6 class="mb-0 fw-bold text-dark" style="font-size: 0.92rem;">Dr Rebecca</h6>
                            <small class="text-muted" style="font-size: 0.8rem;">Internist</small>
                        </div>
                    </div>
                    <button class="btn btn-link text-muted p-0" style="box-shadow: none;">
                        <i class="bi bi-three-dots-vertical"></i>
                    </button>
                </div>
                <!-- Doctor 3 -->
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-3">
                        <img src="#" class="rounded-circle shadow-sm" style="width: 40px; height: 40px; object-fit: cover;">
                        <div>
                            <h6 class="mb-0 fw-bold text-dark" style="font-size: 0.92rem;">Dr Emon</h6>
                            <small class="text-muted" style="font-size: 0.8rem;">Ophthalmologist</small>
                        </div>
                    </div>
                    <button class="btn btn-link text-muted p-0" style="box-shadow: none;">
                        <i class="bi bi-three-dots-vertical"></i>
                    </button>
                </div>
                <!-- Doctor 4 -->
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-3">
                        <img src="#" class="rounded-circle shadow-sm" style="width: 40px; height: 40px; object-fit: cover;">
                        <div>
                            <h6 class="mb-0 fw-bold text-dark" style="font-size: 0.92rem;">Dr Nadia</h6>
                            <small class="text-muted" style="font-size: 0.8rem;">Ophthalmologist</small>
                        </div>
                    </div>
                    <button class="btn btn-link text-muted p-0" style="box-shadow: none;">
                        <i class="bi bi-three-dots-vertical"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection