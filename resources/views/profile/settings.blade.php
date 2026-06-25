@extends('profile.profileLayout')

@section('title', 'Profile Settings')

@section('content')
<div class="row g-4 justify-content-center">
    <div class="col-12 col-lg-8">
        <div class="hospital-card d-flex flex-column h-100">
            
            
            <div class="mb-4">
                <h3 class="fw-bold text-dark mb-1" style="letter-spacing: -0.5px;">Profile Settings</h3>
                <p class="text-muted small">Update your personal and account information</p>
            </div>

            
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Please fix the following errors:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf

                
                <div class="mb-5">
                    <h5 class="fw-bold text-dark mb-3">Personal Information</h5>
                    
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="name" class="form-label fw-semibold text-dark">Full Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="email" class="form-label fw-semibold text-dark">Email Address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="phone" class="form-label fw-semibold text-dark">Phone Number</label>
                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
                            @error('phone')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                
                @if ($user->role === 'patient')
                    <div class="mb-5">
                        <h5 class="fw-bold text-dark mb-3">Medical Information</h5>
                        
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label for="blood_type" class="form-label fw-semibold text-dark">Blood Type</label>
                                <select class="form-select @error('blood_type') is-invalid @enderror" id="blood_type" name="blood_type">
                                    <option value="">Select Blood Type</option>
                                    <option value="O+" {{ old('blood_type', $user->blood_type) === 'O+' ? 'selected' : '' }}>O+</option>
                                    <option value="O-" {{ old('blood_type', $user->blood_type) === 'O-' ? 'selected' : '' }}>O-</option>
                                    <option value="A+" {{ old('blood_type', $user->blood_type) === 'A+' ? 'selected' : '' }}>A+</option>
                                    <option value="A-" {{ old('blood_type', $user->blood_type) === 'A-' ? 'selected' : '' }}>A-</option>
                                    <option value="B+" {{ old('blood_type', $user->blood_type) === 'B+' ? 'selected' : '' }}>B+</option>
                                    <option value="B-" {{ old('blood_type', $user->blood_type) === 'B-' ? 'selected' : '' }}>B-</option>
                                    <option value="AB+" {{ old('blood_type', $user->blood_type) === 'AB+' ? 'selected' : '' }}>AB+</option>
                                    <option value="AB-" {{ old('blood_type', $user->blood_type) === 'AB-' ? 'selected' : '' }}>AB-</option>
                                </select>
                                @error('blood_type')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            

                        <div class="col-12 col-md-6">
                            <label for="sex" class="form-label fw-semibold text-dark">Sex</label>
                            <select class="form-select @error('sex') is-invalid @enderror" id="sex" name="sex">
                                <option value="">Select Sex</option>
                                <option value="Male"   {{ old('sex', $user->sex)   === 'Male'   ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('sex', $user->sex)   === 'Female' ? 'selected' : '' }}>Female</option>
                                <option value="Other"  {{ old('sex', $user->sex)   === 'Other'  ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('sex')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="birthday" class="form-label fw-semibold text-dark">Birthday</label>
                            <input type="date" class="form-control @error('birthday') is-invalid @enderror" id="birthday" name="birthday" value="{{ old('birthday', $user->birthday) }}">
                            @error('birthday')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="age" class="form-label fw-semibold text-dark">Age</label>
                            <input type="number" class="form-control" id="age" name="age" value="{{ old('age', $user->age) }}" readonly>
                        </div>

                            <div class="col-12">
                                <label for="allergies" class="form-label fw-semibold text-dark">Allergies</label>
                                <textarea class="form-control @error('allergies') is-invalid @enderror" id="allergies" name="allergies" rows="3" placeholder="List any known allergies">{{ old('allergies', $user->allergies) }}</textarea>
                                @error('allergies')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="medical_conditions" class="form-label fw-semibold text-dark">Medical Conditions</label>
                                <textarea class="form-control @error('medical_conditions') is-invalid @enderror" id="medical_conditions" name="medical_conditions" rows="3" placeholder="List any existing medical conditions">{{ old('medical_conditions', $user->medical_conditions) }}</textarea>
                                @error('medical_conditions')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                @elseif ($user->role === 'doctor')
                    <div class="mb-5">
                        <h5 class="fw-bold text-dark mb-3">Professional Information</h5>
                        
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label for="specialization" class="form-label fw-semibold text-dark">Specialization</label>
                                <input type="text" class="form-control @error('specialization') is-invalid @enderror" id="specialization" name="specialization" value="{{ old('specialization', $user->specialization) }}" placeholder="e.g., Cardiology, Surgery">
                                @error('specialization')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="license_number" class="form-label fw-semibold text-dark">License Number</label>
                                <input type="text" class="form-control @error('license_number') is-invalid @enderror" id="license_number" name="license_number" value="{{ old('license_number', $user->license_number) }}" placeholder="Medical License Number">
                                @error('license_number')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="availability" class="form-label fw-semibold text-dark">Availability</label>
                                <textarea class="form-control @error('availability') is-invalid @enderror" id="availability" name="availability" rows="3" placeholder="e.g., Monday-Friday 9AM-5PM">{{ old('availability', $user->availability) }}</textarea>
                                @error('availability')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                @endif

                
                <div class="mb-5">
                    <h5 class="fw-bold text-dark mb-3">Security Settings</h5>
                    
                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <label for="password" class="form-label fw-semibold text-dark">New Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter new password">
                            <small class="text-muted">Leave blank to keep current</small>
                            @error('password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="password_confirmation" class="form-label fw-semibold text-dark">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm new password">
                        </div>
                    </div>
                </div>

                
                <div class="d-flex gap-2 justify-content-end">
                    <a href="javascript:window.history.back()" class="btn btn-outline-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .hospital-card {
        background-color: white;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .form-label {
        color: #1b1b18;
        margin-bottom: 0.5rem;
    }

    .form-control, .form-select {
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        padding: 0.625rem 0.875rem;
        font-size: 0.9375rem;
        transition: all 0.2s;
    }

    .form-control:focus, .form-select:focus {
        border-color: #0f5cfd;
        box-shadow: 0 0 0 3px rgba(15, 92, 253, 0.1);
    }

    .btn-primary {
        background-color: #0f5cfd;
        border-color: #0f5cfd;
        border-radius: 8px;
        padding: 0.625rem 1.5rem;
        font-weight: 500;
    }

    .btn-primary:hover {
        background-color: #0d47d4;
        border-color: #0d47d4;
    }

    .btn-outline-secondary {
        border-radius: 8px;
        padding: 0.625rem 1.5rem;
        font-weight: 500;
    }
</style>

<script>
    document.getElementById('birthday')?.addEventListener('change', function () {
        const birthday = new Date(this.value);
        const today = new Date();
        let age = today.getFullYear() - birthday.getFullYear();
        const m = today.getMonth() - birthday.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthday.getDate())) age--;
        document.getElementById('age').value = age >= 0 ? age : '';
    });
</script>

@endsection
