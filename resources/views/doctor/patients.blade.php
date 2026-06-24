@extends('layout')

@section('content')
<div class="container py-2">
    <div class="mb-4">
        <a href="{{ route('doctor.directory') }}" class="text-decoration-none text-muted small d-inline-flex align-items-center">
            ← Back to Directory Master Ledger
        </a>
    </div>

    @if(isset($patient))
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm overflow-hidden mb-4 bg-white">
                    <div class="bg-primary p-4 text-white">
                        <div class="d-flex align-items-center">
                            <div class="bg-white text-primary rounded-circle d-flex align-items-center justify-content-center me-3 fw-bold fs-4" style="width: 60px; height: 60px; min-width: 60px;">
                                {{ strtoupper(substr($patient->first_name, 0, 1)) }}{{ strtoupper(substr($patient->last_name, 0, 1)) }}
                            </div>
                            <div>
                                <h3 class="fw-bold mb-0">{{ $patient->first_name }} {{ $patient->last_name }}</h3>
                                <small class="opacity-75">Active Profile Registry Record</small>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <h5 class="fw-bold text-dark mb-3 border-bottom pb-2">📋 Basic Information</h5>
                        <div class="row g-3 mb-4">
                            <div class="col-sm-4">
                                <label class="text-uppercase text-muted font-monospace small d-block mb-1">Date of Birth</label>
                                <span class="fw-semibold text-dark">{{ \Carbon\Carbon::parse($patient->date_of_birth)->format('M d, Y') }}</span>
                            </div>
                            <div class="col-sm-4">
                                <label class="text-uppercase text-muted font-monospace small d-block mb-1">Age</label>
                                <span class="fw-semibold text-dark">{{ $patient->age }} years old</span>
                            </div>
                            <div class="col-sm-4">
                                <label class="text-uppercase text-muted font-monospace small d-block mb-1">Sex</label>
                                <span class="fw-semibold text-dark">{{ $patient->sex }}</span>
                            </div>
                        </div>

                        <h5 class="fw-bold text-dark mb-3 border-bottom pb-2">📞 Contact Details</h5>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label class="text-uppercase text-muted font-monospace small d-block mb-1">Email Address</label>
                                <span class="fw-semibold text-dark font-monospace small">{{ $patient->email }}</span>
                            </div>
                            <div class="col-sm-6">
                                <label class="text-uppercase text-muted font-monospace small d-block mb-1">Phone Number</label>
                                <span class="fw-semibold text-dark font-monospace small">{{ $patient->phone_number }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm p-4 bg-white">
                    <div class="d-flex justify-content-between align-items-center mb-3 border-bottom pb-2">
                        <h5 class="fw-bold text-dark mb-0">🩺 Consultation Log</h5>
                        <span class="badge bg-primary bg-opacity-10 text-primary fw-semibold small">
                            Recorded On: {{ \Carbon\Carbon::parse($patient->consultation_date)->format('M d, Y') }} at {{ \Carbon\Carbon::parse($patient->consultation_time)->format('h:i A') }}
                        </span>
                    </div>
                    
                    <div class="mb-3 bg-light p-3 rounded border-start border-primary border-3">
                        <label class="text-uppercase fw-bold text-primary font-monospace small d-block mb-1">Symptoms Summary</label>
                        <p class="text-dark mb-0 small lh-base">{{ $patient->symptoms }}</p>
                    </div>

                    <div class="mb-3 bg-light p-3 rounded border-start border-danger border-3">
                        <label class="text-uppercase fw-bold text-danger font-monospace small d-block mb-1">Physician Diagnosis</label>
                        <p class="text-dark mb-0 small fw-bold lh-base">{{ $patient->diagnosis }}</p>
                    </div>

                    <div class="bg-light p-3 rounded border-start border-secondary border-3">
                        <label class="text-uppercase fw-bold text-secondary font-monospace small d-block mb-1">Medication Prescription</label>
                        <p class="text-dark mb-0 font-monospace small lh-base bg-white p-2 rounded border border-light">
                            {{ $patient->prescription ?? 'No ongoing chemical medication prescription logged.' }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm bg-white p-4 h-100">
                    <h5 class="fw-bold text-dark mb-1">🗓️ Booking Timeline</h5>
                    <p class="text-muted small mb-4">Scheduled events generated inside your database matching this profile.</p>
                    
                    <div class="mb-4">
                        <h6 class="text-uppercase font-monospace text-primary fw-bold small mb-2.5">➡️ Upcoming Slots</h6>
                        <div class="d-flex flex-column gap-2">
                            @php $hasUpcoming = false; @endphp
                            @foreach($appointments as $app)
                                @if(\Carbon\Carbon::parse($app->appointment_date)->isFuture() || \Carbon\Carbon::parse($app->appointment_date)->isToday())
                                    @php $hasUpcoming = true; @endphp
                                    <div class="p-3 bg-light rounded border-start border-primary border-3">
                                        <div class="fw-bold text-dark small">{{ \Carbon\Carbon::parse($app->appointment_date)->format('F d, Y') }}</div>
                                        <div class="text-secondary small font-monospace mt-0.5">{{ \Carbon\Carbon::parse($app->appointment_time)->format('h:i A') }}</div>
                                    </div>
                                @endif
                            @endforeach
                            @if(!$hasUpcoming)
                                <div class="text-muted font-monospace small p-3 bg-light rounded border border-dashed text-center opacity-75">No scheduled sessions.</div>
                            @endif
                        </div>
                    </div>

                    <div>
                        <h6 class="text-uppercase font-monospace text-secondary fw-bold small mb-2.5">⏮️ Historic Sessions</h6>
                        <div class="d-flex flex-column gap-2">
                            @php $hasPast = false; @endphp
                            @foreach($appointments as $app)
                                @if(\Carbon\Carbon::parse($app->appointment_date)->isPast() && !\Carbon\Carbon::parse($app->appointment_date)->isToday())
                                    @php $hasPast = true; @endphp
                                    <div class="p-3 bg-light rounded border-start border-secondary border-3 opacity-75">
                                        <div class="fw-semibold text-muted small">{{ \Carbon\Carbon::parse($app->appointment_date)->format('F d, Y') }}</div>
                                        <div class="text-muted small font-monospace mt-0.5">{{ \Carbon\Carbon::parse($app->appointment_time)->format('h:i A') }}</div>
                                    </div>
                                @endif
                            @endforeach
                            @if(!$hasPast)
                                <div class="text-muted font-monospace small p-3 bg-light rounded border border-dashed text-center opacity-75">No historical logs parsed.</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection