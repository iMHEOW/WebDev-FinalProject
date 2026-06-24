@extends('admin.adminLayout')

@section('content')
@if(session('success'))
    <div class="alert alert-success rounded-3 py-2 px-3 mb-3 d-flex align-items-center gap-2" style="font-size: 0.85rem;">
        <i class="bi bi-check-circle-fill text-success"></i> {{ session('success') }}
    </div>
@endif

<div class="card border-0 bg-white rounded-4 p-4 shadow-sm">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h5 class="fw-bold mb-1 text-dark" style="letter-spacing: -0.5px;">
                Schedule Conflict Tickets
                <span class="badge bg-danger-subtle text-danger ms-2 px-2.5 py-1 rounded-3" style="font-size: 0.72rem; vertical-align: middle;">
                    {{ count($ticketReports) }} {{ Str::plural('Active', count($ticketReports)) }}
                </span>
            </h5>
            <p class="text-secondary mb-0" style="font-size: 0.85rem;">System detected doctor availability overlaps and booking schedule conflicts</p>
        </div>
        <button onclick="window.location.reload();" class="btn btn-outline-danger btn-sm rounded-3 px-3 py-2 fw-semibold d-flex align-items-center gap-2" style="font-size: 0.8rem;">
            <i class="bi bi-arrow-repeat"></i> Refresh
        </button>
    </div>

    <div class="d-flex flex-column gap-4">
        @forelse($ticketReports as $idx => $ticket)
            @php
                $schedule = \Carbon\Carbon::parse($ticket['schedule']);
                $dateStr      = $schedule->format('F j, Y');
                $startTimeStr = $schedule->format('g:i A');
                $endTimeStr   = $schedule->copy()->addHour()->format('g:i A');
                $dateInput    = $schedule->format('Y-m-d');
                $timeInput    = $schedule->format('H:i');

                $docNameClean = preg_replace('/^(dr\.|dr)\s+/i', '', $ticket['doctor_name']);
                $words = explode(' ', $docNameClean);
                $initials = '';
                foreach ($words as $w) { $initials .= strtoupper(substr($w, 0, 1)); }
                $initials = substr($initials, 0, 2) ?: 'DR';

                $colors = ['#0f5cfd', '#be185d', '#0ca678', '#d97706', '#6366f1'];
                $avatarBg = $colors[(crc32($docNameClean) & 0x7fffffff) % count($colors)];
            @endphp

            <div class="border rounded-4 p-4" style="border-color: #f1f5f9 !important;">
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 border-bottom pb-3 mb-3" style="border-color: #f1f5f9 !important;">
                    <span class="text-secondary fw-semibold" style="font-size: 0.85rem;">Ticket #{{ $ticket['ticket_id'] }}</span>
                    <span class="text-secondary" style="font-size: 0.8rem;">Detected Automatically</span>
                </div>

                <div class="row g-4 align-items-center">
                    <div class="col-md-3 border-end" style="border-color: #f1f5f9 !important;">
                        <h6 class="text-secondary mb-1" style="font-size: 0.8rem;">Specialist</h6>
                        <div class="d-flex align-items-center gap-3 mt-2">
                            <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold text-white" style="width: 32px; height: 32px; font-size: 0.75rem; background-color: {{ $avatarBg }}; flex-shrink: 0;">
                                {{ $initials }}
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
                        <span class="text-danger fw-semibold" style="font-size: 0.8rem;"><i class="bi bi-clock"></i> {{ $startTimeStr }} – {{ $endTimeStr }}</span>
                    </div>

                    <div class="col-md-4 border-end" style="border-color: #f1f5f9 !important;">
                        <h6 class="text-secondary mb-2" style="font-size: 0.8rem;">Conflicting Bookings ({{ count($ticket['bookings']) }} Patients)</h6>
                        <div class="d-flex flex-column gap-2">
                            @foreach($ticket['bookings'] as $i => $booking)
                                <div class="d-flex align-items-center justify-content-between bg-light p-2 rounded-3">
                                    <span class="fw-semibold text-dark" style="font-size: 0.75rem;">{{ $i + 1 }}. {{ $booking->patient_name }}</span>
                                    @if($booking->visit_type == 1)
                                        <span class="badge bg-success text-white" style="font-size: 0.65rem;">Teleconsult</span>
                                    @else
                                        <span class="badge bg-primary text-white" style="font-size: 0.65rem;">In-Person</span>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-2 text-end">
                        <div class="d-flex flex-column gap-2">
                            <button class="btn btn-primary btn-sm fw-semibold rounded-3 py-2 d-flex align-items-center gap-2 justify-content-center"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#reschedule-{{ $idx }}"
                                    style="background-color: #0f5cfd; color: #fff; font-size: 0.78rem; border: none;">
                                <i class="bi bi-calendar-event"></i> Reschedule
                            </button>
                            <button class="btn btn-outline-secondary btn-sm fw-semibold rounded-3 py-2 d-flex align-items-center gap-2 justify-content-center"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#reassign-{{ $idx }}"
                                    style="font-size: 0.78rem; border: 1px solid #cbd5e1;">
                                <i class="bi bi-person-dash"></i> Reassign
                            </button>
                        </div>
                    </div>
                </div>

                <div class="collapse mt-4" id="reschedule-{{ $idx }}">
                    <div class="border rounded-3 p-3" style="background-color: #f8fafc; border-color: #e2e8f0 !important;">
                        <h6 class="fw-bold text-dark mb-3" style="font-size: 0.82rem;"><i class="bi bi-calendar-check me-1 text-primary"></i>Set New Schedule for Each Patient</h6>
                        <form action="{{ route('admin.ticket.reschedule') }}" method="POST">
                            @csrf
                            @foreach($ticket['bookings'] as $i => $booking)
                                <input type="hidden" name="appt_ids[]" value="{{ $booking->appointment_id }}">
                                <div class="row g-2 align-items-center mb-2 py-2 border-bottom" style="border-color: #e2e8f0 !important;">
                                    <div class="col-md-3">
                                        <span class="fw-semibold text-dark" style="font-size: 0.8rem;">{{ $booking->patient_name }}</span>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="text-secondary d-block" style="font-size: 0.72rem;">New Date</label>
                                        <input type="date" name="dates[]" class="form-control form-control-sm bg-white border" value="{{ $dateInput }}" required style="font-size: 0.8rem; border-radius: 8px;">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="text-secondary d-block" style="font-size: 0.72rem;">New Time</label>
                                        <input type="time" name="times[]" class="form-control form-control-sm bg-white border" value="{{ $timeInput }}" required style="font-size: 0.8rem; border-radius: 8px;">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="text-secondary d-block" style="font-size: 0.72rem;">Consultation Type</label>
                                        <select name="visit_types[]" class="form-select form-select-sm bg-white border" style="font-size: 0.8rem; border-radius: 8px;">
                                            <option value="1" {{ $booking->visit_type == 1 ? 'selected' : '' }}>Teleconsult</option>
                                            <option value="2" {{ $booking->visit_type == 2 ? 'selected' : '' }}>F2F Checkup (In-Person)</option>
                                        </select>
                                    </div>
                                </div>
                            @endforeach
                            <div class="d-flex gap-2 mt-3">
                                <button type="submit" class="btn btn-sm fw-semibold px-4 py-2 rounded-3" style="background-color: #0f5cfd; color: #fff; font-size: 0.8rem; border: none;">
                                    <i class="bi bi-save me-1"></i> Save New Schedules
                                </button>
                                <button type="button" class="btn btn-light btn-sm fw-semibold px-3 py-2 rounded-3" data-bs-toggle="collapse" data-bs-target="#reschedule-{{ $idx }}" style="font-size: 0.8rem; border: 1px solid #e2e8f0; color: #64748b;">
                                    Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="collapse mt-4" id="reassign-{{ $idx }}">
                    <div class="border rounded-3 p-3" style="background-color: #f8fafc; border-color: #e2e8f0 !important;">
                        <h6 class="fw-bold text-dark mb-3" style="font-size: 0.82rem;"><i class="bi bi-person-check me-1 text-secondary"></i>Reassign Each Patient to a Different Doctor</h6>
                        <form action="{{ route('admin.ticket.reassign') }}" method="POST">
                            @csrf
                            @foreach($ticket['bookings'] as $i => $booking)
                                <input type="hidden" name="appt_ids[]" value="{{ $booking->appointment_id }}">
                                <div class="row g-2 align-items-center mb-2 py-2 border-bottom" style="border-color: #e2e8f0 !important;">
                                    <div class="col-md-4">
                                        <span class="fw-semibold text-dark" style="font-size: 0.8rem;">{{ $booking->patient_name }}</span>
                                        <span class="text-secondary d-block" style="font-size: 0.72rem;">Currently: Dr. {{ preg_replace('/^(dr\.|dr)\s+/i', '', $ticket['doctor_name']) }}</span>
                                    </div>
                                    <div class="col-md-8">
                                        <label class="text-secondary d-block" style="font-size: 0.72rem;">Assign to</label>
                                        <select name="doctor_ids[]" class="form-select form-select-sm bg-white border" style="font-size: 0.8rem; border-radius: 8px;">
                                            @foreach($allDoctors as $doctor)
                                                <option value="{{ $doctor->doctor_id }}" {{ $doctor->doctor_id == $ticket['doctor_id'] ? 'selected' : '' }}>
                                                    {{ $doctor->name }} — {{ $doctor->department }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endforeach
                            <div class="d-flex gap-2 mt-3">
                                <button type="submit" class="btn btn-sm fw-semibold px-4 py-2 rounded-3" style="background-color: #334155; color: #fff; font-size: 0.8rem; border: none;">
                                    <i class="bi bi-save me-1"></i> Save Reassignment
                                </button>
                                <button type="button" class="btn btn-light btn-sm fw-semibold px-3 py-2 rounded-3" data-bs-toggle="collapse" data-bs-target="#reassign-{{ $idx }}" style="font-size: 0.8rem; border: 1px solid #e2e8f0; color: #64748b;">
                                    Cancel
                                </button>
                            </div>
                        </form>
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

<style>
    .collapse.show { animation: fadeSlideIn 0.2s ease; }
    @keyframes fadeSlideIn {
        from { opacity: 0; transform: translateY(-6px); }
        to   { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection
