@extends('adminLayout')

@section('content')

<div class="row g-4 mb-5">
    <div class="col-md-6 col-xl-3">
        <div class="card border-0 text-white rounded-4 p-3 shadow-sm" style="background: linear-gradient(135deg, #0f5cfd 0%, #0046d5 100%);">
            <div class="d-flex align-items-center gap-2 mb-3 opacity-90">
                <i class="bi bi-person-fill fs-5"></i>
                <span class="fw-semibold" style="font-size: 0.9rem;">Total Doctors</span>
            </div>
            <h2 class="fw-bold mb-3" style="font-size: 2.2rem; letter-spacing: -1px;">{{ $doctorsCount }}</h2>
            <div class="d-flex align-items-center gap-2 fs-7 opacity-85">
                <i class="bi bi-graph-up"></i>
                <span>Active Medical Staff</span>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 col-xl-3">
        <div class="card border-0 bg-white rounded-4 p-3 shadow-sm">
            <div class="d-flex align-items-center gap-2 mb-3 text-secondary">
                <i class="bi bi-activity fs-5 text-primary"></i>
                <span class="fw-semibold" style="font-size: 0.9rem;">Total Patient</span>
            </div>
            <h2 class="fw-bold mb-3 text-dark" style="font-size: 2.2rem; letter-spacing: -1px;">{{ number_format($patientsCount) }}</h2>
            <div class="d-flex align-items-center gap-2 fs-7 text-success fw-semibold">
                <i class="bi bi-arrow-up-short fs-5"></i>
                <span>Registered patients</span>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card border-0 bg-white rounded-4 p-3 shadow-sm">
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

    <div class="col-md-6 col-xl-3">
        <div class="card border-0 bg-white rounded-4 p-3 shadow-sm">
            <div class="d-flex align-items-center gap-2 mb-3 text-secondary">
                <i class="bi bi-calendar-check fs-5 text-primary"></i>
                <span class="fw-semibold" style="font-size: 0.9rem;">Total Appointment</span>
            </div>
            <h2 class="fw-bold mb-3 text-dark" style="font-size: 2.2rem; letter-spacing: -1px;">{{ $appointmentsCount }}</h2>
            <div class="d-flex align-items-center gap-2 fs-7 text-success fw-semibold">
                <i class="bi bi-arrow-up-short fs-5"></i>
                <span>Total booked schedule</span>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mb-5">
    <div class="col-lg-7">
        <div class="card border-0 bg-white rounded-4 p-4 shadow-sm h-100">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="fw-bold mb-0 text-dark" style="font-size: 1.15rem;">Appointment</h5>
                <a href="#" class="text-primary text-decoration-none fw-semibold" style="font-size: 0.85rem;">View all</a>
            </div>
            
            <div class="d-flex flex-column gap-3">
                @forelse($recentAppointments as $app)
                    @php
                        // Get initials from doctor name
                        $words = explode(' ', preg_replace('/^(dr\.|dr)\s+/i', '', $app->doctor_name));
                        $initials = '';
                        foreach ($words as $w) {
                            $initials .= strtoupper(substr($w, 0, 1));
                        }
                        $initials = substr($initials, 0, 2);

                        // Parse schedule
                        $dateObj = \Carbon\Carbon::parse($app->schedule);
                        $formattedDate = $dateObj->isToday() ? 'Today' : $dateObj->format('M d, Y');
                        $formattedTime = $dateObj->format('h:i A');
                    @endphp
                    <div class="d-flex justify-content-between align-items-center pb-3 border-bottom border-light">
                        <div class="d-flex align-items-center gap-3">
                            <div class="d-flex align-items-center justify-content-center rounded-circle fw-bold text-white shadow-sm" style="width: 36px; height: 36px; font-size: 0.85rem; background: linear-gradient(135deg, #3b82f6, #1d4ed8);">
                                {{ $initials ?: 'DR' }}
                            </div>
                            <div>
                                <h6 class="mb-0 fw-bold text-dark" style="font-size: 0.95rem;">{{ $app->doctor_name }}</h6>
                                <small class="text-muted" style="font-size: 0.8rem;">{{ $app->doctor_specialization }}</small>
                            </div>
                        </div>
                        <div class="text-end">
                            <div class="fw-bold text-dark" style="font-size: 0.9rem;">{{ $formattedDate }}</div>
                            <small class="text-muted" style="font-size: 0.8rem;">{{ $formattedTime }}</small>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-4 text-secondary">
                        <i class="bi bi-calendar-x fs-2 d-block mb-2 text-muted"></i>
                        No scheduled appointments today
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    
    <div class="col-lg-5">
        <div class="card border-0 bg-white rounded-4 p-4 shadow-sm h-100">
            <h5 class="fw-bold mb-4 text-dark" style="font-size: 1.15rem;">Room Availability</h5>
            <div class="d-flex flex-column gap-3.5">
                <div class="d-flex align-items-center justify-content-between py-2 border-bottom border-light">
                    <div class="d-flex align-items-center gap-3">
                        <span class="rounded-circle" style="width: 12px; height: 12px; background-color: #a855f7; display: inline-block;"></span>
                        <span class="fw-semibold text-secondary" style="font-size: 0.92rem;">General Ward</span>
                    </div>
                    <span class="fw-bold text-dark" style="font-size: 1rem;">{{ $rooms['General Ward'] ?? 0 }}</span>
                </div>
                <div class="d-flex align-items-center justify-content-between py-2 border-bottom border-light">
                    <div class="d-flex align-items-center gap-3">
                        <span class="rounded-circle" style="width: 12px; height: 12px; background-color: #3b82f6; display: inline-block;"></span>
                        <span class="fw-semibold text-secondary" style="font-size: 0.92rem;">Private Room</span>
                    </div>
                    <span class="fw-bold text-dark" style="font-size: 1rem;">{{ $rooms['Private Room'] ?? 0 }}</span>
                </div>
                <div class="d-flex align-items-center justify-content-between py-2 border-bottom border-light">
                    <div class="d-flex align-items-center gap-3">
                        <span class="rounded-circle" style="width: 12px; height: 12px; background-color: #eab308; display: inline-block;"></span>
                        <span class="fw-semibold text-secondary" style="font-size: 0.92rem;">Semi-private Room</span>
                    </div>
                    <span class="fw-bold text-dark" style="font-size: 1rem;">{{ $rooms['Semi-private Room'] ?? 0 }}</span>
                </div>
                <div class="d-flex align-items-center justify-content-between py-2 border-bottom border-light">
                    <div class="d-flex align-items-center gap-3">
                        <span class="rounded-circle" style="width: 12px; height: 12px; background-color: #ef4444; display: inline-block;"></span>
                        <span class="fw-semibold text-secondary" style="font-size: 0.92rem;">Emergency Room</span>
                    </div>
                    <span class="fw-bold text-dark" style="font-size: 1rem;">{{ $rooms['Emergency Room'] ?? 0 }}</span>
                </div>
                <div class="d-flex align-items-center justify-content-between py-2 border-bottom border-light">
                    <div class="d-flex align-items-center gap-3">
                        <span class="rounded-circle" style="width: 12px; height: 12px; background-color: #22c55e; display: inline-block;"></span>
                        <span class="fw-semibold text-secondary" style="font-size: 0.92rem;">ICU</span>
                    </div>
                    <span class="fw-bold text-dark" style="font-size: 1rem;">{{ $rooms['ICU'] ?? 0 }}</span>
                </div>
                <div class="d-flex align-items-center justify-content-between py-2">
                    <div class="d-flex align-items-center gap-3">
                        <span class="rounded-circle" style="width: 12px; height: 12px; background-color: #f97316; display: inline-block;"></span>
                        <span class="fw-semibold text-secondary" style="font-size: 0.92rem;">Operation Theatre</span>
                    </div>
                    <span class="fw-bold text-dark" style="font-size: 1rem;">{{ $rooms['Operation Theatre'] ?? 0 }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection