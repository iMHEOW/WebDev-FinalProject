@extends('admin.adminLayout')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.doctors') }}" class="btn btn-light btn-sm rounded-3 px-3 py-2 fw-semibold text-secondary d-inline-flex align-items-center gap-2" style="font-size: 0.8rem; border: 1px solid #e2e8f0; text-decoration: none;">
        <i class="bi bi-arrow-left"></i> Back to Doctors
    </a>
</div>

<div class="card border-0 bg-white rounded-4 p-4 shadow-sm" style="max-width: 700px;">
    <div class="mb-4">
        <h5 class="fw-bold mb-1 text-dark" style="letter-spacing: -0.5px;">Add New Doctor</h5>
        <p class="text-secondary mb-0" style="font-size: 0.85rem;">Fill in the details below to register a new specialist in the system.</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success rounded-3 py-2 px-3 mb-4" style="font-size: 0.85rem;">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.doctor.store') }}" method="POST" novalidate>
        @csrf

        <div class="row g-3">
            <div class="col-12">
                <label for="name" class="form-label fw-semibold text-dark" style="font-size: 0.82rem;">Full Name</label>
                <input type="text" id="name" name="name" class="form-control bg-light border-0 py-2" placeholder="e.g. Maria L. Reyes" value="{{ old('name') }}" required style="font-size: 0.85rem; border-radius: 10px;">
                @error('name')<span class="text-danger" style="font-size: 0.75rem;">{{ $message }}</span>@enderror
            </div>

            <div class="col-md-6">
                <label for="specialization" class="form-label fw-semibold text-dark" style="font-size: 0.82rem;">Specialization</label>
                <input type="text" id="specialization" name="specialization" class="form-control bg-light border-0 py-2" placeholder="e.g. Cardiologist" value="{{ old('specialization') }}" required style="font-size: 0.85rem; border-radius: 10px;">
                @error('specialization')<span class="text-danger" style="font-size: 0.75rem;">{{ $message }}</span>@enderror
            </div>

            <div class="col-md-6">
                <label for="department" class="form-label fw-semibold text-dark" style="font-size: 0.82rem;">Department</label>
                <select id="department" name="department" class="form-select bg-light border-0 py-2" required style="font-size: 0.85rem; border-radius: 10px; color: #334155;">
                    <option value="" disabled selected>Select department...</option>
                    <option value="General Surgery" {{ old('department') == 'General Surgery' ? 'selected' : '' }}>General Surgery</option>
                    <option value="Cardiology" {{ old('department') == 'Cardiology' ? 'selected' : '' }}>Cardiology</option>
                    <option value="Dermatology" {{ old('department') == 'Dermatology' ? 'selected' : '' }}>Dermatology</option>
                    <option value="Pediatrics" {{ old('department') == 'Pediatrics' ? 'selected' : '' }}>Pediatrics</option>
                    <option value="Orthopedics" {{ old('department') == 'Orthopedics' ? 'selected' : '' }}>Orthopedics</option>
                    <option value="Neurology" {{ old('department') == 'Neurology' ? 'selected' : '' }}>Neurology</option>
                    <option value="Hematology" {{ old('department') == 'Hematology' ? 'selected' : '' }}>Hematology</option>
                    <option value="Other" {{ old('department') == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('department')<span class="text-danger" style="font-size: 0.75rem;">{{ $message }}</span>@enderror
            </div>

            <div class="col-md-6">
                <label for="phone" class="form-label fw-semibold text-dark" style="font-size: 0.82rem;">Phone Number</label>
                <input type="text" id="phone" name="phone" class="form-control bg-light border-0 py-2" placeholder="e.g. 09981234567" value="{{ old('phone') }}" required style="font-size: 0.85rem; border-radius: 10px;">
                @error('phone')<span class="text-danger" style="font-size: 0.75rem;">{{ $message }}</span>@enderror
            </div>

            <div class="col-md-6">
                <label for="email" class="form-label fw-semibold text-dark" style="font-size: 0.82rem;">Email Address</label>
                <input type="email" id="email" name="email" class="form-control bg-light border-0 py-2" placeholder="e.g. dr.reyes@pupcare.com" value="{{ old('email') }}" required style="font-size: 0.85rem; border-radius: 10px;">
                @error('email')<span class="text-danger" style="font-size: 0.75rem;">{{ $message }}</span>@enderror
            </div>

            <div class="col-md-6">
                <label for="password" class="form-label fw-semibold text-dark" style="font-size: 0.82rem;">Password</label>
                <input type="password" id="password" name="password" class="form-control bg-light border-0 py-2" placeholder="Set login password" required style="font-size: 0.85rem; border-radius: 10px;">
                @error('password')<span class="text-danger" style="font-size: 0.75rem;">{{ $message }}</span>@enderror
            </div>

            <div class="col-md-6">
                <label for="status" class="form-label fw-semibold text-dark" style="font-size: 0.82rem;">Initial Status</label>
                <select id="status" name="status" class="form-select bg-light border-0 py-2" style="font-size: 0.85rem; border-radius: 10px; color: #334155;">
                    <option value="On Duty" {{ old('status', 'On Duty') == 'On Duty' ? 'selected' : '' }}>On Duty</option>
                    <option value="On Leave" {{ old('status') == 'On Leave' ? 'selected' : '' }}>On Leave</option>
                </select>
            </div>
        </div>

        <div class="d-flex gap-2 mt-4">
            <button type="submit" class="btn fw-semibold px-4 py-2 rounded-3" style="background-color: #0f5cfd; color: #fff; font-size: 0.85rem; border: none;">
                <i class="bi bi-person-check-fill me-1"></i> Register Doctor
            </button>
            <a href="{{ route('admin.doctors') }}" class="btn btn-light fw-semibold px-4 py-2 rounded-3" style="font-size: 0.85rem; border: 1px solid #e2e8f0; color: #64748b; text-decoration: none;">Cancel</a>
        </div>
    </form>
</div>
@endsection
