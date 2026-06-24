@extends('adminLayout')

@section('content')
<div class="card border-0 bg-white rounded-4 p-4 shadow-sm">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
        <ul class="nav nav-pills gap-2" id="appointmentTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active fw-semibold px-3 py-2" id="upcoming-tab" data-bs-toggle="tab" data-bs-target="#upcoming" type="button" role="tab" aria-controls="upcoming" aria-selected="true" style="font-size: 0.85rem; border-radius: 8px;">
                    Upcoming Appointments
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link fw-semibold px-3 py-2 text-secondary bg-transparent" id="past-tab" data-bs-toggle="tab" data-bs-target="#past" type="button" role="tab" aria-controls="past" aria-selected="false" style="font-size: 0.85rem; border-radius: 8px;">
                    Past Appointments & History
                </button>
            </li>
        </ul>
        <span class="text-secondary fw-medium" style="font-size: 0.8rem;">Sorted by Schedule Date</span>
    </div>

    <div class="tab-content" id="appointmentTabsContent">
        <div class="tab-pane fade show active" id="upcoming" role="tabpanel" aria-labelledby="upcoming-tab">
            <div class="table-responsive">
                <table class="table table-borderless align-middle mb-0">
                    <thead>
                        <tr class="border-bottom" style="border-color: #f1f5f9 !important;">
                            <th class="text-muted fw-bold text-uppercase pb-3" style="font-size: 0.75rem; letter-spacing: 0.5px;">Patient Name</th>
                            <th class="text-muted fw-bold text-uppercase pb-3" style="font-size: 0.75rem; letter-spacing: 0.5px;">Date / Time</th>
                            <th class="text-muted fw-bold text-uppercase pb-3" style="font-size: 0.75rem; letter-spacing: 0.5px;">Type</th>
                            <th class="text-muted fw-bold text-uppercase pb-3" style="font-size: 0.75rem; letter-spacing: 0.5px;">Assigned Doctor</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($upcomingAppointments as $appt)
                            @php
                                $schedule = \Carbon\Carbon::parse($appt->schedule);
                                $dateStr = $schedule->format('F j, Y');
                                $timeStr = $schedule->format('g:i A');

                                $docNameClean = preg_replace('/^(dr\.|dr)\s+/i', '', $appt->doctor_name);
                                $words = explode(' ', $docNameClean);
                                $initials = '';
                                foreach ($words as $w) {
                                    $initials .= strtoupper(substr($w, 0, 1));
                                }
                                $initials = substr($initials, 0, 2);
                            @endphp
                            <tr class="border-bottom" style="border-color: #f8fafc !important;">
                                <td class="py-3 fw-bold text-dark">{{ $appt->patient_name }}</td>
                                <td class="py-3 text-secondary" style="font-size: 0.9rem;">
                                    <span class="text-dark d-block fw-medium" style="font-size: 0.85rem;">{{ $dateStr }}</span>
                                    <span class="text-secondary" style="font-size: 0.75rem;">{{ $timeStr }}</span>
                                </td>
                                <td class="py-3">
                                    @if($appt->visit_type == 1)
                                        <span class="badge rounded-pill px-3 py-1.5 fw-semibold" style="background-color: #f0f4ff; color: #0f5cfd; font-size: 0.75rem;">Teleconsult</span>
                                    @else
                                        <span class="badge rounded-pill px-3 py-1.5 fw-semibold" style="background-color: #e6fcf5; color: #0ca678; font-size: 0.75rem;">F2F Checkup</span>
                                    @endif
                                </td>
                                <td class="py-3">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="rounded-circle bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center text-secondary fw-bold" style="width: 28px; height: 28px; font-size: 0.75rem;">{{ $initials ?: 'DR' }}</div>
                                        <span class="fw-semibold text-secondary" style="font-size: 0.9rem;">Dr. {{ $docNameClean }}</span>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-secondary">
                                    <i class="bi bi-calendar-event fs-2 d-block mb-2 text-muted"></i>
                                    No upcoming appointments found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tab-pane fade" id="past" role="tabpanel" aria-labelledby="past-tab">
            <div class="table-responsive">
                <table class="table table-borderless align-middle mb-0">
                    <thead>
                        <tr class="border-bottom" style="border-color: #f1f5f9 !important;">
                            <th class="text-muted fw-bold text-uppercase pb-3" style="font-size: 0.75rem; letter-spacing: 0.5px;">Patient Name</th>
                            <th class="text-muted fw-bold text-uppercase pb-3" style="font-size: 0.75rem; letter-spacing: 0.5px;">Date / Time</th>
                            <th class="text-muted fw-bold text-uppercase pb-3" style="font-size: 0.75rem; letter-spacing: 0.5px;">Type</th>
                            <th class="text-muted fw-bold text-uppercase pb-3" style="font-size: 0.75rem; letter-spacing: 0.5px;">Assigned Doctor</th>
                            <th class="text-muted fw-bold text-uppercase pb-3 text-center" style="font-size: 0.75rem; letter-spacing: 0.5px;">STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pastAppointments as $appt)
                            @php
                                $schedule = \Carbon\Carbon::parse($appt->schedule);
                                $dateStr = $schedule->format('F j, Y');
                                $timeStr = $schedule->format('g:i A');

                                $docNameClean = preg_replace('/^(dr\.|dr)\s+/i', '', $appt->doctor_name);
                                $words = explode(' ', $docNameClean);
                                $initials = '';
                                foreach ($words as $w) {
                                    $initials .= strtoupper(substr($w, 0, 1));
                                }
                                $initials = substr($initials, 0, 2);
                            @endphp
                            <tr class="border-bottom" style="border-color: #f8fafc !important;">
                                <td class="py-3 fw-bold text-dark">{{ $appt->patient_name }}</td>
                                <td class="py-3 text-secondary" style="font-size: 0.9rem;">
                                    <span class="text-dark d-block fw-medium" style="font-size: 0.85rem;">{{ $dateStr }}</span>
                                    <span class="text-secondary" style="font-size: 0.75rem;">{{ $timeStr }}</span>
                                </td>
                                <td class="py-3">
                                    @if($appt->visit_type == 1)
                                        <span class="badge rounded-pill px-3 py-1.5 fw-semibold" style="background-color: #f0f4ff; color: #0f5cfd; font-size: 0.75rem;">Teleconsult</span>
                                    @else
                                        <span class="badge rounded-pill px-3 py-1.5 fw-semibold" style="background-color: #e6fcf5; color: #0ca678; font-size: 0.75rem;">F2F Checkup</span>
                                    @endif
                                </td>
                                <td class="py-3">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="rounded-circle bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center text-secondary fw-bold" style="width: 28px; height: 28px; font-size: 0.75rem;">{{ $initials ?: 'DR' }}</div>
                                        <span class="fw-semibold text-secondary" style="font-size: 0.9rem;">Dr. {{ $docNameClean }}</span>
                                    </div>
                                </td>
                                <td class="py-3 text-center">
                                    @if($appt->status === 'Completed')
                                        <span class="badge bg-success-subtle text-success fw-bold px-2.5 py-1.5" style="font-size: 0.75rem;">Done</span>
                                    @elseif($appt->status === 'Cancelled')
                                        <span class="badge bg-secondary-subtle text-secondary fw-bold px-2.5 py-1.5" style="font-size: 0.75rem;">Cancelled</span>
                                    @else
                                        <span class="badge bg-danger-subtle text-danger fw-bold px-2.5 py-1.5" style="font-size: 0.75rem;">{{ $appt->status }}</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-secondary">
                                    <i class="bi bi-clock-history fs-2 d-block mb-2 text-muted"></i>
                                    No past appointments found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    #appointmentTabs .nav-link {
        transition: all 0.2s;
    }
    #appointmentTabs .nav-link.active {
        background-color: #f0f4ff !important;
        color: #0f5cfd !important;
    }
    #appointmentTabs .nav-link:not(.active):hover {
        background-color: #f8fafc !important;
        color: #1e293b !important;
    }
</style>
@endsection
