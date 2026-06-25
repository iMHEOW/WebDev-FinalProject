@extends('layout')

@section('content')
<div class="container-fluid p-0">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-1">Welcome back, {{ Auth::user() ? Auth::user()->name : 'Doctor' }}!</h2>
            <p class="text-secondary mb-0 small">Here is what your medical queue looks like today.</p>
        </div>
        <span class="badge bg-white border text-dark px-3 py-2 rounded-3 fw-bold small">
            <i class="bi bi-calendar3 text-primary me-2"></i> {{ date('F d, Y') }}
        </span>
    </div>

    <div class="row g-4">
        
        <div class="col-lg-8">
            <div class="hospital-card h-100">
                <div class="mb-4">
                    <h4 class="text-uppercase fw-bold text-dark mb-0" style="font-size: 12px; letter-spacing: 0.5px;">
                        <i class="bi bi-clock-history text-primary me-1"></i> Upcoming Appointments
                    </h4>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle border-0 mb-0">
                        <thead class="table-light border-0">
                            <tr class="text-secondary text-uppercase" style="font-size: 11px;">
                                <th class="border-0 py-3 ps-3">Patient ID</th>
                                <th class="border-0 py-3">Schedule</th>
                                <th class="border-0 py-3">Modality</th>
                                <th class="border-0 py-3 text-end pe-3">Action</th>
                            </tr>
                        </thead>
                        <tbody class="border-0" style="font-size: 13px;">
                            @foreach($appointments as $app)
                                <tr class="border-bottom">
                                    <td class="py-3 ps-3 fw-bold text-dark">
                                        Patient #{{ $app->patient_id }}
                                    </td>
                                    <td class="py-3 text-dark fw-medium">
                                        {{ $app->schedule }}
                                    </td>
                                    <td class="py-3">
                                        <span class="badge bg-info-subtle text-info border border-info-subtle rounded-2 px-2 py-1 fw-bold">
                                             {{ $app->visit_type == 1 ? 'In-Person' : ($app->visit_type == 2 ? 'Teleconsult' : $app->visit_type) }}
                                        </span>
                                    </td>
                                    <td class="py-3 text-end pe-3">
                                        <a href="{{ route('doctor.patient.profile', $app->patient_id) }}" class="btn btn-sm btn-outline-primary rounded-3 px-3 fw-bold">Open Chart</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="hospital-card h-100">
                <h4 class="text-uppercase fw-bold text-dark border-bottom pb-2 mb-3" style="font-size: 12px; letter-spacing: 0.5px;">
                    <i class="bi bi-pin-angle-fill text-danger me-1"></i> Pending Tasks Checklist
                </h4>
                
                <div class="d-flex flex-column gap-3 mt-3">
                    <div class="p-3 border rounded-3 bg-light d-flex align-items-start gap-3">
                        <input class="form-check-input mt-1" type="checkbox" id="task1">
                        <label class="form-check-label w-100 text-dark small fw-medium" for="task1">
                            Follow up patient Maria Clara
                        </label>
                    </div>

                    <div class="p-3 border rounded-3 bg-light d-flex align-items-start gap-3">
                        <input class="form-check-input mt-1" type="checkbox" id="task2">
                        <label class="form-check-label w-100 text-dark small fw-medium" for="task2">
                            Prescription Renewal Request
                        </label>
                    </div>

                    <div class="p-3 border rounded-3 bg-light d-flex align-items-start gap-3">
                        <input class="form-check-input mt-1" type="checkbox" id="task3">
                        <label class="form-check-label w-100 text-dark small fw-medium" for="task3">
                            Unfinished doctor's notes
                        </label>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection