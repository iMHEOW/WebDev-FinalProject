@extends('adminLayout')

@section('content')
<div class="row g-3 mb-4">
    <div class="col-md-6">
        <div class="card border-0 bg-white p-3 rounded-4 shadow-sm">
            <div class="d-flex align-items-center gap-3">
                <div class="rounded-3 p-3" style="background-color: #fff1f2; color: #f43f5e;">
                    <i class="bi bi-exclamation-octagon fs-4"></i>
                </div>
                <div>
                    <h6 class="text-secondary mb-1" style="font-size: 0.8rem;">Active Conflicts</h6>
                    <h4 class="fw-bold mb-0 text-dark">{{ count($ticketReports) }}</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card border-0 bg-white p-3 rounded-4 shadow-sm">
            <div class="d-flex align-items-center gap-3">
                <div class="rounded-3 p-3" style="background-color: #ecfdf5; color: #10b981;">
                    <i class="bi bi-check-circle-fill fs-4"></i>
                </div>
                <div>
                    <h6 class="text-secondary mb-1" style="font-size: 0.8rem;">Resolved Today</h6>
                    <h4 class="fw-bold mb-0 text-dark">4</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 bg-white rounded-4 p-4 shadow-sm">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h5 class="fw-bold mb-1 text-dark" style="letter-spacing: -0.5px;">Schedule Conflict Tickets</h5>
            <p class="text-secondary mb-0" style="font-size: 0.85rem;">System detected doctor availability overlaps and booking schedule conflicts</p>
        </div>
        <button onclick="window.location.reload();" class="btn btn-outline-danger btn-sm rounded-3 px-3 py-2 fw-semibold d-flex align-items-center gap-2" style="font-size: 0.8rem;">
            <i class="bi bi-arrow-repeat"></i> Refresh
        </button>
    </div>

    <div class="d-flex flex-column gap-3">
        @forelse($ticketReports as $ticket)
            @php
                $schedule = \Carbon\Carbon::parse($ticket['schedule']);
                $dateStr = $schedule->format('F j, Y');
                $startTimeStr = $schedule->format('g:i A');
                $endTimeStr = $schedule->addHour()->format('g:i A');

                $docNameClean = preg_replace('/^(dr\.|dr)\s+/i', '', $ticket['doctor_name']);
                $words = explode(' ', $docNameClean);
                $initials = '';
                foreach ($words as $w) {
                    $initials .= strtoupper(substr($w, 0, 1));
                }
                $initials = substr($initials, 0, 2);

                $colors = ['#0f5cfd', '#be185d', '#0ca678', '#d97706', '#6366f1'];
                $bgIdx = (crc32($docNameClean) & 0x7fffffff) % count($colors);
                $avatarBg = $colors[$bgIdx];
            @endphp
            <div class="border rounded-4 p-4" style="border-color: #f1f5f9 !important;">
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 border-bottom pb-3 mb-3" style="border-color: #f1f5f9 !important;">
                    <div class="d-flex align-items-center gap-2">
                        <span class="text-secondary fw-semibold" style="font-size: 0.85rem;">Ticket #{{ $ticket['ticket_id'] }}</span>
                    </div>
                    <span class="text-secondary" style="font-size: 0.8rem;">Detected Automatically</span>
                </div>

                <div class="row g-4 align-items-center">
                    <div class="col-md-3 border-end" style="border-color: #f1f5f9 !important;">
                        <h6 class="text-secondary mb-1" style="font-size: 0.8rem;">Target Specialist</h6>
                        <div class="d-flex align-items-center gap-3 mt-2">
                            <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold text-white" style="width: 32px; height: 32px; font-size: 0.75rem; background-color: {{ $avatarBg }};">
                                {{ $initials ?: 'DR' }}
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0 text-dark" style="font-size: 0.85rem;">Dr. {{ $docNameClean }}</h6>
                                <span class="text-secondary" style="font-size: 0.75rem;">{{ $ticket['department'] }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 border-end" style="border-color: #f1f5f9 !important;">
                        <h6 class="text-secondary mb-1" style="font-size: 0.8rem;">Overlapping Schedule</h6>
                        <h6 class="fw-bold text-dark mt-2 mb-1" style="font-size: 0.85rem;">{{ $dateStr }}</h6>
                        <span class="text-danger fw-semibold" style="font-size: 0.8rem;"><i class="bi bi-clock"></i> {{ $startTimeStr }} - {{ $endTimeStr }}</span>
                    </div>

                    <div class="col-md-4">
                        <h6 class="text-secondary mb-2" style="font-size: 0.8rem;">Conflicting Bookings ({{ count($ticket['bookings']) }} Patients)</h6>
                        <div class="d-flex flex-column gap-2">
                            @foreach($ticket['bookings'] as $index => $booking)
                                <div class="d-flex align-items-center justify-content-between bg-light p-2 rounded-3">
                                    <span class="fw-semibold text-dark" style="font-size: 0.75rem;">{{ $index + 1 }}. {{ $booking->patient_name }}</span>
                                    @if($booking->visit_type == 1)
                                        <span class="badge bg-success text-white" style="font-size: 0.65rem;">Teleconsult</span>
                                    @else
                                        <span class="badge bg-primary text-white" style="font-size: 0.65rem;">In-Person</span>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-2 text-md-end">
                        <div class="d-flex flex-column gap-2">
                            <button class="btn btn-primary btn-sm rounded-3 py-2 fw-semibold" style="font-size: 0.75rem; background-color: #0f5cfd; border: none;">Reschedule</button>
                            <button class="btn btn-outline-secondary btn-sm rounded-3 py-2 fw-semibold" style="font-size: 0.75rem; border: 1px solid #cbd5e1;">Reassign</button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-5 text-secondary">
                <i class="bi bi-check-circle fs-2 d-block mb-2 text-success"></i>
                No schedule conflicts detected. All clear!
            </div>
        @endforelse
    </div>
</div>
@endsection
