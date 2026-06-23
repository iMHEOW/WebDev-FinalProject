@extends('layout')

@section('content')
<div class="container py-3">
    <div class="card border-0 shadow-sm p-4 bg-white">
        <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
            <h2 class="fw-bold text-dark mb-0">New Clinical Consultation Log</h2>
            <span class="badge bg-light text-primary border px-3 py-2 fw-bold">
                🗓️ Session Date: {{ date('F d, Y') }}
            </span>
        </div>
        
        <form action="{{ route('consultation.store') }}" method="POST">
            @csrf

            <h4 class="mb-3 text-primary fw-semibold">Patient Basic Information</h4>
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label for="first_name" class="form-label fw-medium text-secondary small">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" required placeholder="John">
                </div>

                <div class="col-md-6">
                    <label for="last_name" class="form-label fw-medium text-secondary small">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" required placeholder="Doe">
                </div>

                <div class="col-md-4">
                    <label for="date_of_birth" class="form-label fw-medium text-secondary small">Date of Birth</label>
                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                </div>

                <div class="col-md-4">
                    <label for="age" class="form-label fw-medium text-secondary small">Age</label>
                    <input type="number" class="form-control" id="age" name="age" required min="0" placeholder="25">
                </div>

                <div class="col-md-4">
                    <label for="sex" class="form-label fw-medium text-secondary small">Sex</label>
                    <select class="form-select" id="sex" name="sex" required>
                        <option value="" disabled selected>Select Sex</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="email" class="form-label fw-medium text-secondary small">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" required placeholder="johndoe@example.com">
                </div>

                <div class="col-md-6">
                    <label for="phone_number" class="form-label fw-medium text-secondary small">Phone Number</label>
                    <input type="tel" class="form-control" id="phone_number" name="phone_number" required placeholder="09123456789">
                </div>
            </div>

            <input type="hidden" name="consultation_date" value="{{ date('Y-m-d') }}">
            <input type="hidden" name="consultation_time" value="{{ date('H:i:s') }}">

            <h4 class="mb-3 text-primary fw-semibold">Clinical Examination Records</h4>
            <div class="mb-3">
                <label for="symptoms" class="form-label fw-medium text-secondary small">Symptoms / Chief Complaint</label>
                <textarea class="form-control" id="symptoms" name="symptoms" rows="3" required placeholder="Describe user active medical complaints..."></textarea>
            </div>

            <div class="mb-3">
                <label for="diagnosis" class="form-label fw-medium text-secondary small">Diagnosis Notes</label>
                <textarea class="form-control" id="diagnosis" name="diagnosis" rows="3" required placeholder="Summary of clinical findings..."></textarea>
            </div>

            <div class="mb-4">
                <label for="prescription" class="form-label fw-medium text-secondary small">Prescription Plan (Optional)</label>
                <textarea class="form-control" id="prescription" name="prescription" rows="3" placeholder="List medications, dosage requirements, and follow-ups..."></textarea>
            </div>

            <div class="d-flex gap-2 justify-content-end border-top pt-4">
                <a href="{{ route('doctor.directory') }}" class="btn btn-light px-4 fw-medium text-secondary">Cancel</a>
                <button type="submit" class="btn btn-success px-4 fw-medium">Save Consultation Log</button>
            </div>
        </form>
    </div>
</div>
@endsection