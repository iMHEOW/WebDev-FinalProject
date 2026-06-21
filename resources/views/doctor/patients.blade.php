@extends('layout')

@section('content')
<div class="container-fluid p-0">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="text-dark fw-bold mb-0">Patient Clinical Chart Profile</h4>
        <a href="/doctor/directory" class="btn btn-white btn-sm border bg-white rounded-3 fw-bold text-secondary px-3 py-2">
            ← Back to Patient Directory
        </a>
    </div>

    <div class="row g-4">
        
        <div class="col-lg-4">
            <div class="hospital-card text-center d-flex flex-column align-items-center">
                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold mb-3" style="width: 64px; height: 64px; font-size: 20px;">
                    PT
                </div>
                <h4 class="fw-bold text-dark mb-1">Maria Clara de los Santos</h4>
                <span class="badge bg-primary-subtle text-primary px-2.5 py-1 rounded-2 small fw-bold mb-3">ID: #P-88321</span>

                <div class="w-100 border-top mt-2 pt-3 text-start d-flex flex-column gap-2" style="font-size: 13px;">
                    <div class="d-flex justify-content-between">
                        <span class="text-muted">Age & Gender:</span>
                        <span class="fw-bold text-dark">24 Years Old • Female</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span class="text-muted">Birthdate:</span>
                        <span class="fw-bold text-dark">October 23, 2001</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span class="text-muted">Contact:</span>
                        <span class="fw-bold text-dark">+63 917 123 4567</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="hospital-card">
                <h4 class="text-uppercase fw-bold text-dark border-bottom pb-2 mb-3" style="font-size: 12px;">
                    📋 Baseline History & Clinical Summary Records
                </h4>
                <div class="d-flex flex-column gap-3 mt-2" style="font-size: 13.5px;">
                    <div>
                        <p class="text-muted fw-bold mb-1" style="font-size: 10px;">CHRONIC CONDITIONS LOG</p>
                        <p class="fw-bold text-dark">Stage 1 Essential Hypertension</p>
                    </div>
                    <div>
                        <p class="text-muted fw-bold mb-1" style="font-size: 10px;">KNOWN ALLERGIES DRUG PANEL</p>
                        <p class="badge bg-danger-subtle text-danger border rounded-3 px-2 py-1 fw-bold mb-0">
                            ⚠️ Penicillin Antibiotics
                        </p>
                    </div>
                    <div>
                        <p class="text-muted fw-bold mb-1" style="font-size: 10px;">FAMILY ANTECEDENTS LOG</p>
                        <p class="text-secondary leading-relaxed mb-0">
                            Paternal history of early-onset cardiovascular complications and acute myocardial risks.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection