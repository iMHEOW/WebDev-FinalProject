@extends('layout')

@section('content')
<div class="container-fluid p-0">

    <div class="mb-4">
        <h2 class="fw-bold text-dark mb-1">Active Consultation Session Room</h2>
        <p class="text-secondary mb-0 small">Input clinical findings, assessment metrics, and prescription metrics below.</p>
    </div>

    <form action="#" method="POST" class="row g-4">
        @csrf

        <div class="col-lg-8 d-flex flex-column gap-4">
            
            <div class="hospital-card">
                <h4 class="text-uppercase fw-bold text-dark border-bottom pb-2 mb-3" style="font-size: 12px;">
                    <i class="bi bi-file-earmark-text-fill text-primary me-1"></i> Clinical Assessment & Diagnosis Findings
                </h4>
                <div class="mb-3">
                    <label class="form-label small fw-bold text-secondary mb-1">Chief Presenting Symptoms</label>
                    <textarea class="form-control text-sm" name="symptoms" rows="3" placeholder="Patient reports high stress, temporary chest tightness during exertion..." required></textarea>
                </div>
                <div>
                    <label class="form-label small fw-bold text-secondary mb-1">Final Medical Diagnosis / Impression Notes</label>
                    <textarea class="form-control text-sm" name="diagnosis" rows="3" placeholder="Stage 1 Essential Hypertension. Heart palpitations noted but stable..." required></textarea>
                </div>
            </div>

            <div class="hospital-card">
                <h4 class="text-uppercase fw-bold text-dark border-bottom pb-2 mb-3" style="font-size: 12px;">
                    <i class="bi bi-capsule me-1 text-warning"></i> Rx Medical Prescription Form
                </h4>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label small fw-bold text-secondary mb-1">Medication Name & Strength</label>
                        <input type="text" class="form-control text-sm" name="med_name" placeholder="e.g., Losartan 50mg">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label small fw-bold text-secondary mb-1">Frequency</label>
                        <input type="text" class="form-control text-sm" name="frequency" placeholder="e.g., 1x daily">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label small fw-bold text-secondary mb-1">Duration</label>
                        <input type="text" class="form-control text-sm" name="duration" placeholder="e.g., 30 Days">
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-4 d-flex flex-column gap-4">
            <div class="hospital-card">
                <h4 class="text-uppercase fw-bold text-dark border-bottom pb-2 mb-3" style="font-size: 12px;">
                    <i class="bi bi-heart-pulse-fill text-danger me-1"></i> Patient Vitals Signatures
                </h4>
                <div class="row g-2">
                    <div class="col-6">
                        <label class="form-label text-secondary fw-bold" style="font-size: 10px;">BLOOD PRESSURE</label>
                        <input type="text" class="form-control text-center text-sm fw-bold" name="bp" placeholder="120/80">
                    </div>
                    <div class="col-6">
                        <label class="form-label text-secondary fw-bold" style="font-size: 10px;">HEART RATE (BPM)</label>
                        <input type="text" class="form-control text-center text-sm fw-bold" name="hr" placeholder="78">
                    </div>
                </div>
            </div>

            <div class="hospital-card d-flex flex-column gap-2 text-center">
                <button type="submit" class="btn btn-blue w-100 py-2.5 rounded-3 fw-bold shadow-sm">
                    Save Consultation Record
                </button>
                <a href="/doctor/dashboard" class="btn btn-light border w-100 py-2 rounded-3 text-secondary small fw-bold">
                    Cancel Session
                </a>
            </div>
        </div>

    </form>

</div>
@endsection