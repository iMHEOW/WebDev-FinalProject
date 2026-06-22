@extends('adminLayout')

@section('content')
<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card border-0 bg-white p-3 rounded-4 shadow-sm">
            <div class="d-flex align-items-center gap-3">
                <div class="rounded-3 p-3" style="background-color: #f0f4ff; color: #0f5cfd;">
                    <i class="bi bi-people fs-4"></i>
                </div>
                <div>
                    <h6 class="text-secondary mb-1" style="font-size: 0.8rem;">Total Doctors</h6>
                    <h4 class="fw-bold mb-0 text-dark">350</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 bg-white p-3 rounded-4 shadow-sm">
            <div class="d-flex align-items-center gap-3">
                <div class="rounded-3 p-3" style="background-color: #ecfdf5; color: #10b981;">
                    <i class="bi bi-heart-pulse fs-4"></i>
                </div>
                <div>
                    <h6 class="text-secondary mb-1" style="font-size: 0.8rem;">On Duty Today</h6>
                    <h4 class="fw-bold mb-0 text-dark">123</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 bg-white p-3 rounded-4 shadow-sm">
            <div class="d-flex align-items-center gap-3">
                <div class="rounded-3 p-3" style="background-color: #fff7ed; color: #f97316;">
                    <i class="bi bi-clock-history fs-4"></i>
                </div>
                <div>
                    <h6 class="text-secondary mb-1" style="font-size: 0.8rem;">Pending Appointments</h6>
                    <h4 class="fw-bold mb-0 text-dark">24</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 bg-white p-3 rounded-4 shadow-sm">
            <div class="d-flex align-items-center gap-3">
                <div class="rounded-3 p-3" style="background-color: #fff1f2; color: #f43f5e;">
                    <i class="bi bi-bookmark-star fs-4"></i>
                </div>
                <div>
                    <h6 class="text-secondary mb-1" style="font-size: 0.8rem;">Primary Departments</h6>
                    <h4 class="fw-bold mb-0 text-dark">6</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 bg-white rounded-4 p-4 shadow-sm">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h5 class="fw-bold mb-1 text-dark" style="letter-spacing: -0.5px;">Doctors Directory</h5>
            <p class="text-secondary mb-0" style="font-size: 0.85rem;">Manage active doctor accounts grouped by their specialty and department</p>
        </div>
        <button class="btn btn-primary btn-sm rounded-3 px-3 py-2 fw-semibold d-flex align-items-center gap-2" style="background-color: #0f5cfd; border: none; font-size: 0.8rem;">
            <i class="bi bi-plus-lg"></i> Add New Doctor
        </button>
    </div>

    <!-- Search & Department Filters -->
    <div class="row g-3 mb-4">
        <div class="col-md-6 col-lg-4">
            <div class="input-group">
                <span class="input-group-text bg-light border-0" id="search-addon" style="border-radius: 10px 0 0 10px;">
                    <i class="bi bi-search text-secondary"></i>
                </span>
                <input type="text" id="doctorSearch" class="form-control bg-light border-0 py-2" placeholder="Search doctor by name..." aria-describedby="search-addon" style="font-size: 0.85rem; border-radius: 0 10px 10px 0;">
            </div>
        </div>
        <div class="col-md-6 col-lg-3 ms-auto">
            <select id="departmentFilter" class="form-select bg-light border-0 py-2" style="font-size: 0.85rem; border-radius: 10px; color: #64748b;">
                <option value="all">All Specialties / Departments</option>
                <option value="pediatrics">Pediatrics</option>
                <option value="dermatology">Dermatology</option>
                <option value="cardiology">Cardiology</option>
                <option value="surgery">General Surgery</option>
                <option value="orthopedics">Orthopedics</option>
                <option value="hematology">Hematology</option>
            </select>
        </div>
    </div>

    <!-- Grouped Doctors Container -->
    <div id="doctorsContainer">
        
        <!-- Category: Pediatrics -->
        <div class="specialty-group mb-4" data-department="pediatrics">
            <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom" style="border-color: #f1f5f9 !important;">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-primary-subtle text-primary fw-bold px-3 py-2 rounded-3" style="font-size: 0.8rem;">Pediatrics</span>
                    <span class="text-secondary small">2 Specialists</span>
                </div>
            </div>
            <div class="table-responsive mb-2">
                <table class="table table-borderless align-middle mb-0">
                    <thead>
                        <tr class="border-bottom" style="border-color: #f8fafc !important;">
                            <th class="text-muted fw-bold text-uppercase pb-2" style="font-size: 0.7rem; width: 40%;">Doctor</th>
                            <th class="text-muted fw-bold text-uppercase pb-2" style="font-size: 0.7rem; width: 25%;">Contact Info</th>
                            <th class="text-muted fw-bold text-uppercase pb-2 text-center" style="font-size: 0.7rem; width: 15%;">Patients</th>
                            <th class="text-muted fw-bold text-uppercase pb-2 text-center" style="font-size: 0.7rem; width: 10%;">Status</th>
                            <th class="text-muted fw-bold text-uppercase pb-2 text-end" style="font-size: 0.7rem; width: 10%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="d-flex align-items-center justify-content-center rounded-circle fw-bold text-white shadow-sm" style="width: 32px; height: 32px; font-size: 0.8rem; background: linear-gradient(135deg, #3b82f6, #1d4ed8);">
                                        AS
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-0 text-dark doctor-name" style="font-size: 0.85rem;">Dr. Alice C. Santos</h6>
                                        <span class="text-secondary" style="font-size: 0.7rem;">ID: #1003</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-dark d-block" style="font-size: 0.8rem;">09427654321</span>
                                <span class="text-secondary" style="font-size: 0.7rem;">alice@pupcare.com</span>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark fw-semibold px-2 py-1" style="font-size: 0.7rem;">12 Patients</span>
                            </td>
                            <td class="text-center">
                                <span class="badge rounded-pill px-2 py-1 fw-semibold" style="background-color: #fff1f2; color: #f43f5e; font-size: 0.7rem;">On Leave</span>
                            </td>
                            <td class="text-end">
                                <button class="btn btn-light btn-sm rounded-3 px-2.5 py-1 text-secondary" style="font-size: 0.7rem; border: 1px solid #e2e8f0;">Manage</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="d-flex align-items-center justify-content-center rounded-circle fw-bold text-white shadow-sm" style="width: 32px; height: 32px; font-size: 0.8rem; background: linear-gradient(135deg, #3b82f6, #1d4ed8);">
                                        MS
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-0 text-dark doctor-name" style="font-size: 0.85rem;">Dr. Michael Joshua A. Santos</h6>
                                        <span class="text-secondary" style="font-size: 0.7rem;">ID: #1005</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-dark d-block" style="font-size: 0.8rem;">09981234568</span>
                                <span class="text-secondary" style="font-size: 0.7rem;">michael@pupcare.com</span>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark fw-semibold px-2 py-1" style="font-size: 0.7rem;">4 Patients</span>
                            </td>
                            <td class="text-center">
                                <span class="badge rounded-pill px-2 py-1 fw-semibold" style="background-color: #ecfdf5; color: #10b981; font-size: 0.7rem;">On Duty</span>
                            </td>
                            <td class="text-end">
                                <button class="btn btn-light btn-sm rounded-3 px-2.5 py-1 text-secondary" style="font-size: 0.7rem; border: 1px solid #e2e8f0;">Manage</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Category: Dermatology -->
        <div class="specialty-group mb-4" data-department="dermatology">
            <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom" style="border-color: #f1f5f9 !important;">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-success-subtle text-success fw-bold px-3 py-2 rounded-3" style="font-size: 0.8rem;">Dermatology</span>
                    <span class="text-secondary small">2 Specialists</span>
                </div>
            </div>
            <div class="table-responsive mb-2">
                <table class="table table-borderless align-middle mb-0">
                    <thead>
                        <tr class="border-bottom" style="border-color: #f8fafc !important;">
                            <th class="text-muted fw-bold text-uppercase pb-2" style="font-size: 0.7rem; width: 40%;">Doctor</th>
                            <th class="text-muted fw-bold text-uppercase pb-2" style="font-size: 0.7rem; width: 25%;">Contact Info</th>
                            <th class="text-muted fw-bold text-uppercase pb-2 text-center" style="font-size: 0.7rem; width: 15%;">Patients</th>
                            <th class="text-muted fw-bold text-uppercase pb-2 text-center" style="font-size: 0.7rem; width: 10%;">Status</th>
                            <th class="text-muted fw-bold text-uppercase pb-2 text-end" style="font-size: 0.7rem; width: 10%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="d-flex align-items-center justify-content-center rounded-circle fw-bold text-white shadow-sm" style="width: 32px; height: 32px; font-size: 0.8rem; background: linear-gradient(135deg, #10b981, #047857);">
                                        NR
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-0 text-dark doctor-name" style="font-size: 0.85rem;">Dr. Nicole Mae S. Reeyn</h6>
                                        <span class="text-secondary" style="font-size: 0.7; ">ID: #1002</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-dark d-block" style="font-size: 0.8rem;">09407654321</span>
                                <span class="text-secondary" style="font-size: 0.7rem;">nmae@pupcare.com</span>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark fw-semibold px-2 py-1" style="font-size: 0.7rem;">8 Patients</span>
                            </td>
                            <td class="text-center">
                                <span class="badge rounded-pill px-2 py-1 fw-semibold" style="background-color: #ecfdf5; color: #10b981; font-size: 0.7rem;">On Duty</span>
                            </td>
                            <td class="text-end">
                                <button class="btn btn-light btn-sm rounded-3 px-2.5 py-1 text-secondary" style="font-size: 0.7rem; border: 1px solid #e2e8f0;">Manage</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="d-flex align-items-center justify-content-center rounded-circle fw-bold text-white shadow-sm" style="width: 32px; height: 32px; font-size: 0.8rem; background: linear-gradient(135deg, #10b981, #047857);">
                                        KL
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-0 text-dark doctor-name" style="font-size: 0.85rem;">Dr. Karen Louise S. Lim</h6>
                                        <span class="text-secondary" style="font-size: 0.7rem;">ID: #1006</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-dark d-block" style="font-size: 0.8rem;">09981234569</span>
                                <span class="text-secondary" style="font-size: 0.7rem;">karen@pupcare.com</span>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark fw-semibold px-2 py-1" style="font-size: 0.7xl;">6 Patients</span>
                            </td>
                            <td class="text-center">
                                <span class="badge rounded-pill px-2 py-1 fw-semibold" style="background-color: #ecfdf5; color: #10b981; font-size: 0.7rem;">On Duty</span>
                            </td>
                            <td class="text-end">
                                <button class="btn btn-light btn-sm rounded-3 px-2.5 py-1 text-secondary" style="font-size: 0.7rem; border: 1px solid #e2e8f0;">Manage</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Category: Cardiology -->
        <div class="specialty-group mb-4" data-department="cardiology">
            <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom" style="border-color: #f1f5f9 !important;">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-info-subtle text-info fw-bold px-3 py-2 rounded-3" style="font-size: 0.8rem;">Cardiology</span>
                    <span class="text-secondary small">1 Specialist</span>
                </div>
            </div>
            <div class="table-responsive mb-2">
                <table class="table table-borderless align-middle mb-0">
                    <thead>
                        <tr class="border-bottom" style="border-color: #f8fafc !important;">
                            <th class="text-muted fw-bold text-uppercase pb-2" style="font-size: 0.7rem; width: 40%;">Doctor</th>
                            <th class="text-muted fw-bold text-uppercase pb-2" style="font-size: 0.7rem; width: 25%;">Contact Info</th>
                            <th class="text-muted fw-bold text-uppercase pb-2 text-center" style="font-size: 0.7rem; width: 15%;">Patients</th>
                            <th class="text-muted fw-bold text-uppercase pb-2 text-center" style="font-size: 0.7rem; width: 10%;">Status</th>
                            <th class="text-muted fw-bold text-uppercase pb-2 text-end" style="font-size: 0.7rem; width: 10%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="d-flex align-items-center justify-content-center rounded-circle fw-bold text-white shadow-sm" style="width: 32px; height: 32px; font-size: 0.8rem; background: linear-gradient(135deg, #ec4899, #be185d);">
                                        SL
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-0 text-dark doctor-name" style="font-size: 0.85rem;">Dr. Sarah Jean P. Lopez</h6>
                                        <span class="text-secondary" style="font-size: 0.7rem;">ID: #1004</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-dark d-block" style="font-size: 0.8rem;">09981234567</span>
                                <span class="text-secondary" style="font-size: 0.7rem;">sarah@pupcare.com</span>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark fw-semibold px-2 py-1" style="font-size: 0.7rem;">7 Patients</span>
                            </td>
                            <td class="text-center">
                                <span class="badge rounded-pill px-2 py-1 fw-semibold" style="background-color: #ecfdf5; color: #10b981; font-size: 0.7rem;">On Duty</span>
                            </td>
                            <td class="text-end">
                                <button class="btn btn-light btn-sm rounded-3 px-2.5 py-1 text-secondary" style="font-size: 0.7rem; border: 1px solid #e2e8f0;">Manage</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Category: General Surgery -->
        <div class="specialty-group mb-4" data-department="surgery">
            <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom" style="border-color: #f1f5f9 !important;">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-warning-subtle text-warning fw-bold px-3 py-2 rounded-3" style="font-size: 0.8rem; color: #d97706 !important;">General Surgery</span>
                    <span class="text-secondary small">1 Specialist</span>
                </div>
            </div>
            <div class="table-responsive mb-2">
                <table class="table table-borderless align-middle mb-0">
                    <thead>
                        <tr class="border-bottom" style="border-color: #f8fafc !important;">
                            <th class="text-muted fw-bold text-uppercase pb-2" style="font-size: 0.7rem; width: 40%;">Doctor</th>
                            <th class="text-muted fw-bold text-uppercase pb-2" style="font-size: 0.7rem; width: 25%;">Contact Info</th>
                            <th class="text-muted fw-bold text-uppercase pb-2 text-center" style="font-size: 0.7rem; width: 15%;">Patients</th>
                            <th class="text-muted fw-bold text-uppercase pb-2 text-center" style="font-size: 0.7rem; width: 10%;">Status</th>
                            <th class="text-muted fw-bold text-uppercase pb-2 text-end" style="font-size: 0.7rem; width: 10%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="d-flex align-items-center justify-content-center rounded-circle fw-bold text-white shadow-sm" style="width: 32px; height: 32px; font-size: 0.8rem; background: linear-gradient(135deg, #f59e0b, #d97706);">
                                        JD
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-0 text-dark doctor-name" style="font-size: 0.85rem;">Dr. John Martin O. Doe</h6>
                                        <span class="text-secondary" style="font-size: 0.7rem;">ID: #1001</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-dark d-block" style="font-size: 0.8rem;">09387654321</span>
                                <span class="text-secondary" style="font-size: 0.7rem;">jmartin@pupcare.com</span>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark fw-semibold px-2 py-1" style="font-size: 0.7rem;">5 Patients</span>
                            </td>
                            <td class="text-center">
                                <span class="badge rounded-pill px-2 py-1 fw-semibold" style="background-color: #ecfdf5; color: #10b981; font-size: 0.7rem;">On Duty</span>
                            </td>
                            <td class="text-end">
                                <button class="btn btn-light btn-sm rounded-3 px-2.5 py-1 text-secondary" style="font-size: 0.7rem; border: 1px solid #e2e8f0;">Manage</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Category: Orthopedics -->
        <div class="specialty-group mb-4" data-department="orthopedics">
            <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom" style="border-color: #f1f5f9 !important;">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-secondary-subtle text-secondary fw-bold px-3 py-2 rounded-3" style="font-size: 0.8rem;">Orthopedics</span>
                    <span class="text-secondary small">1 Specialist</span>
                </div>
            </div>
            <div class="table-responsive mb-2">
                <table class="table table-borderless align-middle mb-0">
                    <thead>
                        <tr class="border-bottom" style="border-color: #f8fafc !important;">
                            <th class="text-muted fw-bold text-uppercase pb-2" style="font-size: 0.7rem; width: 40%;">Doctor</th>
                            <th class="text-muted fw-bold text-uppercase pb-2" style="font-size: 0.7rem; width: 25%;">Contact Info</th>
                            <th class="text-muted fw-bold text-uppercase pb-2 text-center" style="font-size: 0.7rem; width: 15%;">Patients</th>
                            <th class="text-muted fw-bold text-uppercase pb-2 text-center" style="font-size: 0.7rem; width: 10%;">Status</th>
                            <th class="text-muted fw-bold text-uppercase pb-2 text-end" style="font-size: 0.7rem; width: 10%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="d-flex align-items-center justify-content-center rounded-circle fw-bold text-white shadow-sm" style="width: 32px; height: 32px; font-size: 0.8rem; background: linear-gradient(135deg, #6b7280, #374151);">
                                        DO
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-0 text-dark doctor-name" style="font-size: 0.85rem;">Dr. David Michael R. Ong</h6>
                                        <span class="text-secondary" style="font-size: 0.7rem;">ID: #1007</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-dark d-block" style="font-size: 0.8rem;">09981234570</span>
                                <span class="text-secondary" style="font-size: 0.7rem;">david@pupcare.com</span>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark fw-semibold px-2 py-1" style="font-size: 0.7rem;">9 Patients</span>
                            </td>
                            <td class="text-center">
                                <span class="badge rounded-pill px-2 py-1 fw-semibold" style="background-color: #ecfdf5; color: #10b981; font-size: 0.7rem;">On Duty</span>
                            </td>
                            <td class="text-end">
                                <button class="btn btn-light btn-sm rounded-3 px-2.5 py-1 text-secondary" style="font-size: 0.7rem; border: 1px solid #e2e8f0;">Manage</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Category: Hematology -->
        <div class="specialty-group mb-4" data-department="hematology">
            <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom" style="border-color: #f1f5f9 !important;">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-danger-subtle text-danger fw-bold px-3 py-2 rounded-3" style="font-size: 0.8rem;">Hematology</span>
                    <span class="text-secondary small">1 Specialist</span>
                </div>
            </div>
            <div class="table-responsive mb-2">
                <table class="table table-borderless align-middle mb-0">
                    <thead>
                        <tr class="border-bottom" style="border-color: #f8fafc !important;">
                            <th class="text-muted fw-bold text-uppercase pb-2" style="font-size: 0.7rem; width: 40%;">Doctor</th>
                            <th class="text-muted fw-bold text-uppercase pb-2" style="font-size: 0.7rem; width: 25%;">Contact Info</th>
                            <th class="text-muted fw-bold text-uppercase pb-2 text-center" style="font-size: 0.7rem; width: 15%;">Patients</th>
                            <th class="text-muted fw-bold text-uppercase pb-2 text-center" style="font-size: 0.7rem; width: 10%;">Status</th>
                            <th class="text-muted fw-bold text-uppercase pb-2 text-end" style="font-size: 0.7rem; width: 10%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="d-flex align-items-center justify-content-center rounded-circle fw-bold text-white shadow-sm" style="width: 32px; height: 32px; font-size: 0.8rem; background: linear-gradient(135deg, #ef4444, #991b1b);">
                                        RC
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-0 text-dark doctor-name" style="font-size: 0.85rem;">Dr. Robert H. Cruz</h6>
                                        <span class="text-secondary" style="font-size: 0.7rem;">ID: #1008</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-dark d-block" style="font-size: 0.8rem;">09987654321</span>
                                <span class="text-secondary" style="font-size: 0.7rem;">robert.cruz@pupcare.com</span>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark fw-semibold px-2 py-1" style="font-size: 0.7rem;">3 Patients</span>
                            </td>
                            <td class="text-center">
                                <span class="badge rounded-pill px-2 py-1 fw-semibold" style="background-color: #ecfdf5; color: #10b981; font-size: 0.7rem;">On Duty</span>
                            </td>
                            <td class="text-end">
                                <button class="btn btn-light btn-sm rounded-3 px-2.5 py-1 text-secondary" style="font-size: 0.7rem; border: 1px solid #e2e8f0;">Manage</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<!-- Vanilla JS Filter & Search Logic -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('doctorSearch');
    const deptFilter = document.getElementById('departmentFilter');
    const groups = document.querySelectorAll('.specialty-group');

    function filterDoctors() {
        const searchVal = searchInput.value.toLowerCase().trim();
        const selectedDept = deptFilter.value;

        groups.forEach(group => {
            const groupDept = group.getAttribute('data-department');
            const rows = group.querySelectorAll('tbody tr');
            let hasVisibleRow = false;

            // Check if department matches
            const deptMatches = (selectedDept === 'all' || groupDept === selectedDept);

            rows.forEach(row => {
                const name = row.querySelector('.doctor-name').textContent.toLowerCase();
                const nameMatches = name.includes(searchVal);

                if (deptMatches && nameMatches) {
                    row.style.display = '';
                    hasVisibleRow = true;
                } else {
                    row.style.display = 'none';
                }
            });

            // Show group container only if department matches and has at least one visible row
            if (deptMatches && hasVisibleRow) {
                group.style.display = 'block';
            } else {
                group.style.display = 'none';
            }
        });
    }

    searchInput.addEventListener('input', filterDoctors);
    deptFilter.addEventListener('change', filterDoctors);
});
</script>
@endsection
