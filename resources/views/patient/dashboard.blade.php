@extends('patient.patientLayout')

@section('title', 'Patient Dashboard')

@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h2><b>Welcome back</b>, {{ $patientName }}!</h2>

    <div class="row mt-3 g-4">
        <div class="col-12 col-lg-9">
            <div class="hospital-card d-flex flex-column">
                <div>
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="fw-bold text-dark mb-0 fs-5" style="letter-spacing: -0.5px;">
                            Upcoming Appointments
                        </h4>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-borderless align-middle mb-5">
                            <thead>
                                <tr class="border-bottom text-uppercase text-muted" style="font-size: 12px;">
                                    <th class="pb-3 fw-semibold text-center">Date</th>
                                    <th class="pb-3 fw-semibold text-center">Time</th>
                                    <th class="pb-3 fw-semibold text-center">Modality</th>
                                    <th class="pb-3 fw-semibold text-center">Doctor</th>
                                    <th class="pb-3 fw-semibold text-center">Department</th>
                                    <th class="pb-3 fw-semibold text-center">Status</th>
                                    <th class="pb-3 fw-semibold text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-dark fw-medium" style="font-size: 14px;">
                                @foreach($dboardUp as $row)
                                <tr class="border-bottom text-center">
                                    <td>{{ $row->date }}</td>
                                    <td>{{ $row->time }}</td>
                                    <td>{{ $row->modality }}</td>
                                    <td>{{ $row->doctor }}</td>
                                    <td>{{ $row->department }}</td>
                                    <td>
                                        <span class="{{ $row->status == 'Cancelled' ? 'text-danger fw-bold' : '' }}">
                                            {{ $row->status }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($row->status !== 'Cancelled')
                                            <form action="{{ route('patient.cancelAppointment', ['patient' => $patient_id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this appointment? This action cannot be undone.');">
                                                @csrf
                                                <input type="hidden" name="appointment_id" value="{{ $row->id }}">
                                                <button type="submit" class="btn btn-sm btn-outline-danger fw-semibold" style="font-size: 13px;">
                                                    Cancel
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-muted small">Cancelled</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div>
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="fw-bold text-dark mb-0 fs-5" style="letter-spacing: -0.5px;">
                            Past Appointments (last 30 days)
                        </h4>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-borderless align-middle mb-0">
                            <thead>
                                <tr class="border-bottom text-uppercase text-muted" style="font-size: 12px;">
                                    <th class="pb-3 fw-semibold text-center">Date</th>
                                    <th class="pb-3 fw-semibold text-center">Time</th>
                                    <th class="pb-3 fw-semibold text-center">Doctor</th>
                                    <th class="pb-3 fw-semibold text-center">Department</th>
                                </tr>
                            </thead>
                            <tbody class="text-dark fw-medium" style="font-size: 14px;">
                                @foreach($dboardPast as $row)
                                <tr class="border-bottom text-center">
                                    <td>{{ $row->date }}</td>
                                    <td>{{ $row->time }}</td>
                                    <td>{{ $row->doctor }}</td>
                                    <td>{{ $row->department }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-3">
            <div class="hospital-card text-center mb-4">
                <h6 class="text-muted text-uppercase fw-bold mb-3" style="letter-spacing: 1px;">Upcoming Appointments</h6>
                <h1 class="display-4 fw-bold text-primary mb-0">
                    {{ $upcomingApp ?? 0 }}
                </h1>
            </div>

            <div class="hospital-card text-center mb-4">
            <h6 class="text-muted text-uppercase fw-bold mb-3" style="letter-spacing: 1px;">Active Prescriptions</h6>
                <h1 class="display-4 fw-bold text-success mb-0">
                    {{ $activePre ?? 0 }}
                </h1>
            </div>

            <div class="hospital-card text-center">
                <h6 class="text-muted text-uppercase fw-bold mb-3" style="letter-spacing: 1px;">New Medical Records This Month</h6>
                <h1 class="display-4 fw-bold text-success mb-0">
                    {{ $monthRecord ?? 0 }}
                </h1>
            </div>
        </div>
    </div>
@endsection

@section('styles')
<style>
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

    .hospital-card {
        background-color: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 24px;
    }

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
</style>
@endsection
