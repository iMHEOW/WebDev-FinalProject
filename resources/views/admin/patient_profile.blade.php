@extends('admin.adminLayout')

@section('content')
@php
    $dob = \Carbon\Carbon::parse($patient->dob);
    $age = $dob->age;
    $formattedDob = $dob->format('F j, Y');

    $words = explode(' ', $patient->name);
    $initials = '';
    foreach ($words as $w) { $initials .= strtoupper(substr($w, 0, 1)); }
    $initials = substr($initials, 0, 2) ?: '??';

    $avatarGradient = $patient->gender === 'Female'
        ? 'linear-gradient(135deg, #ec4899, #db2777)'
        : 'linear-gradient(135deg, #3b82f6, #1d4ed8)';
@endphp

<div class="mb-4">
    <a href="{{ route('admin.patients') }}" class="btn btn-light btn-sm rounded-3 px-3 py-2 fw-semibold text-secondary d-inline-flex align-items-center gap-2" style="font-size: 0.8rem; border: 1px solid #e2e8f0; text-decoration: none;">
        <i class="bi bi-arrow-left"></i> Back to Patients
    </a>
</div>

<div class="card border-0 bg-white rounded-4 p-4 shadow-sm mb-4">
    <div class="d-flex flex-wrap align-items-center gap-4">
        <div class="d-flex align-items-center justify-content-center rounded-circle fw-bold text-white shadow" style="width: 72px; height: 72px; font-size: 1.5rem; background: {{ $avatarGradient }}; flex-shrink: 0;">
            {{ $initials }}
        </div>
        <div class="flex-grow-1">
            <h4 class="fw-bold mb-1 text-dark" style="letter-spacing: -0.5px;">{{ $patient->name }}</h4>
            <div class="d-flex flex-wrap gap-3 text-secondary" style="font-size: 0.82rem;">
                <span><i class="bi bi-person me-1"></i>{{ $patient->gender }}</span>
                <span><i class="bi bi-calendar3 me-1"></i>{{ $formattedDob }} &bull; {{ $age }} yrs old</span>
                <span><i class="bi bi-telephone me-1"></i>{{ $patient->phone_no }}</span>
                <span><i class="bi bi-envelope me-1"></i>{{ $patient->email }}</span>
                <span><i class="bi bi-geo-alt me-1"></i>{{ $patient->address }}</span>
            </div>
        </div>
        <div class="text-end">
            <span class="badge rounded-pill px-3 py-2 fw-semibold" style="background-color: #f0f4ff; color: #0f5cfd; font-size: 0.75rem;">Patient ID #{{ $patient->patient_id }}</span>
        </div>
    </div>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card border-0 bg-white p-3 rounded-4 shadow-sm">
            <div class="d-flex align-items-center gap-3">
                <div class="rounded-3 p-3" style="background-color: #f0f4ff; color: #0f5cfd;"><i class="bi bi-calendar-check fs-5"></i></div>
                <div>
                    <h6 class="text-secondary mb-1" style="font-size: 0.78rem;">Total Appointments</h6>
                    <h4 class="fw-bold mb-0 text-dark">{{ $totalAppointments }}</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 bg-white p-3 rounded-4 shadow-sm">
            <div class="d-flex align-items-center gap-3">
                <div class="rounded-3 p-3" style="background-color: #ecfdf5; color: #10b981;"><i class="bi bi-check-circle fs-5"></i></div>
                <div>
                    <h6 class="text-secondary mb-1" style="font-size: 0.78rem;">Completed</h6>
                    <h4 class="fw-bold mb-0 text-dark">{{ $completedAppointments }}</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 bg-white p-3 rounded-4 shadow-sm">
            <div class="d-flex align-items-center gap-3">
                <div class="rounded-3 p-3" style="background-color: #fff7ed; color: #f97316;"><i class="bi bi-clock fs-5"></i></div>
                <div>
                    <h6 class="text-secondary mb-1" style="font-size: 0.78rem;">Pending</h6>
                    <h4 class="fw-bold mb-0 text-dark">{{ $pendingAppointments }}</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 bg-white rounded-4 p-4 shadow-sm">
    <ul class="nav nav-pills gap-2 mb-4" id="profileTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active fw-semibold px-3 py-2" id="appt-tab" data-bs-toggle="tab" data-bs-target="#apptTab" type="button" role="tab" style="font-size: 0.85rem; border-radius: 8px;">
                <i class="bi bi-calendar3 me-1"></i>Appointments
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link fw-semibold px-3 py-2 text-secondary bg-transparent" id="records-tab" data-bs-toggle="tab" data-bs-target="#recordsTab" type="button" role="tab" style="font-size: 0.85rem; border-radius: 8px;">
                <i class="bi bi-journal-medical me-1"></i>Medical Records
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link fw-semibold px-3 py-2 text-secondary bg-transparent" id="rx-tab" data-bs-toggle="tab" data-bs-target="#rxTab" type="button" role="tab" style="font-size: 0.85rem; border-radius: 8px;">
                <i class="bi bi-capsule me-1"></i>Prescriptions
            </button>
        </li>
    </ul>

    <div class="tab-content" id="profileTabsContent">

        <div class="tab-pane fade show active" id="apptTab" role="tabpanel">
            <div class="table-responsive">
                <table class="table table-borderless align-middle mb-0">
                    <thead>
                        <tr class="border-bottom" style="border-color: #f1f5f9 !important;">
                            <th class="text-muted fw-bold text-uppercase pb-3" style="font-size: 0.72rem; letter-spacing: 0.5px;">Schedule</th>
                            <th class="text-muted fw-bold text-uppercase pb-3" style="font-size: 0.72rem; letter-spacing: 0.5px;">Doctor</th>
                            <th class="text-muted fw-bold text-uppercase pb-3" style="font-size: 0.72rem; letter-spacing: 0.5px;">Type</th>
                            <th class="text-muted fw-bold text-uppercase pb-3" style="font-size: 0.72rem; letter-spacing: 0.5px;">Symptoms</th>
                            <th class="text-muted fw-bold text-uppercase pb-3 text-center" style="font-size: 0.72rem; letter-spacing: 0.5px;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($appointments as $appt)
                            @php
                                $sched = \Carbon\Carbon::parse($appt->schedule);
                                $statusStyles = [
                                    'Completed' => ['bg' => '#ecfdf5', 'color' => '#10b981'],
                                    'Pending'   => ['bg' => '#fff7ed', 'color' => '#f97316'],
                                    'Cancelled' => ['bg' => '#f8fafc', 'color' => '#94a3b8'],
                                ];
                                $style = $statusStyles[$appt->status] ?? ['bg' => '#f1f5f9', 'color' => '#64748b'];
                            @endphp
                            <tr class="border-bottom" style="border-color: #f8fafc !important;">
                                <td class="py-3">
                                    <span class="text-dark d-block fw-medium" style="font-size: 0.85rem;">{{ $sched->format('M j, Y') }}</span>
                                    <span class="text-secondary" style="font-size: 0.75rem;">{{ $sched->format('g:i A') }}</span>
                                </td>
                                <td class="py-3">
                                    <span class="text-dark fw-semibold d-block" style="font-size: 0.85rem;">{{ $appt->doctor_name }}</span>
                                    <span class="text-secondary" style="font-size: 0.75rem;">{{ $appt->specialization }}</span>
                                </td>
                                <td class="py-3">
                                    @if($appt->visit_type == 1)
                                        <span class="badge rounded-pill px-2 py-1 fw-semibold" style="background-color: #f0f4ff; color: #0f5cfd; font-size: 0.72rem;">Teleconsult</span>
                                    @else
                                        <span class="badge rounded-pill px-2 py-1 fw-semibold" style="background-color: #e6fcf5; color: #0ca678; font-size: 0.72rem;">F2F Checkup</span>
                                    @endif
                                </td>
                                <td class="py-3 text-secondary" style="font-size: 0.82rem; max-width: 220px;">{{ Str::limit($appt->symptoms, 60) }}</td>
                                <td class="py-3 text-center">
                                    <span class="badge rounded-pill px-2 py-1 fw-semibold" style="background-color: {{ $style['bg'] }}; color: {{ $style['color'] }}; font-size: 0.72rem;">{{ $appt->status }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="text-center py-5 text-secondary"><i class="bi bi-calendar-x fs-3 d-block mb-2 text-muted"></i>No appointments on record.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tab-pane fade" id="recordsTab" role="tabpanel">
            <div class="d-flex flex-column gap-3">
                @forelse($medRecords as $record)
                    <div class="border rounded-4 p-4" style="border-color: #f1f5f9 !important;">
                        <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-2">
                            <div>
                                <span class="badge rounded-pill px-2 py-1 fw-semibold me-2" style="background-color: #f0f4ff; color: #0f5cfd; font-size: 0.72rem;">{{ $record->type }}</span>
                                <span class="text-secondary" style="font-size: 0.78rem;">{{ \Carbon\Carbon::parse($record->date)->format('F j, Y') }}</span>
                            </div>
                            <span class="text-secondary" style="font-size: 0.78rem;"><i class="bi bi-person-badge me-1"></i>{{ $record->doctor_name }} &bull; {{ $record->specialization }}</span>
                        </div>
                        <p class="mb-0 text-dark" style="font-size: 0.875rem; line-height: 1.6;">{{ $record->summary }}</p>
                    </div>
                @empty
                    <div class="text-center py-5 text-secondary"><i class="bi bi-journal-x fs-3 d-block mb-2 text-muted"></i>No medical records found.</div>
                @endforelse
            </div>
        </div>

        <div class="tab-pane fade" id="rxTab" role="tabpanel">
            <div class="table-responsive">
                <table class="table table-borderless align-middle mb-0">
                    <thead>
                        <tr class="border-bottom" style="border-color: #f1f5f9 !important;">
                            <th class="text-muted fw-bold text-uppercase pb-3" style="font-size: 0.72rem; letter-spacing: 0.5px;">Medication</th>
                            <th class="text-muted fw-bold text-uppercase pb-3" style="font-size: 0.72rem; letter-spacing: 0.5px;">Dosage</th>
                            <th class="text-muted fw-bold text-uppercase pb-3" style="font-size: 0.72rem; letter-spacing: 0.5px;">Instructions</th>
                            <th class="text-muted fw-bold text-uppercase pb-3 text-center" style="font-size: 0.72rem; letter-spacing: 0.5px;">Qty</th>
                            <th class="text-muted fw-bold text-uppercase pb-3 text-center" style="font-size: 0.72rem; letter-spacing: 0.5px;">Refills Left</th>
                            <th class="text-muted fw-bold text-uppercase pb-3" style="font-size: 0.72rem; letter-spacing: 0.5px;">Prescribed By</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($prescriptions as $rx)
                            <tr class="border-bottom" style="border-color: #f8fafc !important;">
                                <td class="py-3 fw-bold text-dark" style="font-size: 0.85rem;">{{ $rx->medication }}</td>
                                <td class="py-3 text-secondary" style="font-size: 0.82rem;">{{ $rx->dosage }}</td>
                                <td class="py-3 text-secondary" style="font-size: 0.82rem; max-width: 250px;">{{ $rx->instruction }}</td>
                                <td class="py-3 text-center">
                                    <span class="badge bg-light text-dark fw-semibold px-2 py-1" style="font-size: 0.72rem;">{{ $rx->quantity }}</span>
                                </td>
                                <td class="py-3 text-center">
                                    @if($rx->refills_left > 0)
                                        <span class="badge rounded-pill px-2 py-1 fw-semibold" style="background-color: #ecfdf5; color: #10b981; font-size: 0.72rem;">{{ $rx->refills_left }} left</span>
                                    @else
                                        <span class="badge rounded-pill px-2 py-1 fw-semibold" style="background-color: #fff1f2; color: #f43f5e; font-size: 0.72rem;">No refills</span>
                                    @endif
                                </td>
                                <td class="py-3 text-secondary" style="font-size: 0.82rem;">{{ $rx->doctor_name }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="6" class="text-center py-5 text-secondary"><i class="bi bi-capsule fs-3 d-block mb-2 text-muted"></i>No prescriptions found.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<style>
    #profileTabs .nav-link.active {
        background-color: #f0f4ff !important;
        color: #0f5cfd !important;
    }
    #profileTabs .nav-link:not(.active):hover {
        background-color: #f8fafc !important;
        color: #1e293b !important;
    }
</style>
@endsection
