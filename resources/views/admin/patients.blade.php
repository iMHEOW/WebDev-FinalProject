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
                    <h6 class="text-secondary mb-1" style="font-size: 0.8rem;">Total Patients</h6>
                    <h4 class="fw-bold mb-0 text-dark">1,234</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 bg-white p-3 rounded-4 shadow-sm">
            <div class="d-flex align-items-center gap-3">
                <div class="rounded-3 p-3" style="background-color: #e0f2fe; color: #0284c7;">
                    <i class="bi bi-gender-male fs-4"></i>
                </div>
                <div>
                    <h6 class="text-secondary mb-1" style="font-size: 0.8rem;">Male Patients</h6>
                    <h4 class="fw-bold mb-0 text-dark">234</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 bg-white p-3 rounded-4 shadow-sm">
            <div class="d-flex align-items-center gap-3">
                <div class="rounded-3 p-3" style="background-color: #fce7f3; color: #db2777;">
                    <i class="bi bi-gender-female fs-4"></i>
                </div>
                <div>
                    <h6 class="text-secondary mb-1" style="font-size: 0.8rem;">Female Patients</h6>
                    <h4 class="fw-bold mb-0 text-dark">1,000</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 bg-white p-3 rounded-4 shadow-sm">
            <div class="d-flex align-items-center gap-3">
                <div class="rounded-3 p-3" style="background-color: #ecfdf5; color: #10b981;">
                    <i class="bi bi-journal-medical fs-4"></i>
                </div>
                <div>
                    <h6 class="text-secondary mb-1" style="font-size: 0.8rem;">Appointments</h6>
                    <h4 class="fw-bold mb-0 text-dark">123</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 bg-white rounded-4 p-4 shadow-sm">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h5 class="fw-bold mb-1 text-dark" style="letter-spacing: -0.5px;">Patients Records</h5>
            <p class="text-secondary mb-0" style="font-size: 0.85rem;">View registered patients, assigned medical specialists, and historical files</p>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-6 col-lg-4">
            <div class="input-group">
                <span class="input-group-text bg-light border-0" id="search-addon" style="border-radius: 10px 0 0 10px;">
                    <i class="bi bi-search text-secondary"></i>
                </span>
                <input type="text" class="form-control bg-light border-0 search-input py-2" placeholder="Search by name, contact, doctor..." aria-describedby="search-addon" style="font-size: 0.85rem; border-radius: 0 10px 10px 0;">
            </div>
        </div>
        <div class="col-md-6 col-lg-3 ms-auto">
            <select class="form-select bg-light border-0 py-2" style="font-size: 0.85rem; border-radius: 10px; color: #64748b;">
                <option value="">Sort by Last Visit</option>
                <option value="newest">Newest First</option>
                <option value="oldest">Oldest First</option>
            </select>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-borderless align-middle mb-0">
            <thead>
                <tr class="border-bottom" style="border-color: #f1f5f9 !important;">
                    <th class="text-muted fw-bold text-uppercase pb-3" style="font-size: 0.75rem; letter-spacing: 0.5px;">Patient Info</th>
                    <th class="text-muted fw-bold text-uppercase pb-3" style="font-size: 0.75rem; letter-spacing: 0.5px;">Contact Info</th>
                    <th class="text-muted fw-bold text-uppercase pb-3" style="font-size: 0.75rem; letter-spacing: 0.5px;">Birth Info / Address</th>
                    <th class="text-muted fw-bold text-uppercase pb-3 text-center" style="font-size: 0.75rem; letter-spacing: 0.5px;">Records</th>
                    <th class="text-muted fw-bold text-uppercase pb-3 text-end" style="font-size: 0.75rem; letter-spacing: 0.5px;">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Patient 1 -->
                <tr class="border-bottom" style="border-color: #f8fafc !important;">
                    <td class="py-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="d-flex align-items-center justify-content-center rounded-circle fw-bold text-white shadow-sm" style="width: 36px; height: 36px; font-size: 0.85rem; background: linear-gradient(135deg, #ec4899, #db2777);">
                                AB
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0 text-dark" style="font-size: 0.9rem;">Amihan R. Batumbakal</h6>
                                <span class="text-secondary" style="font-size: 0.75rem;">ID: #5001</span>
                            </div>
                        </div>
                    </td>
                    <td class="py-3">
                        <div class="d-flex flex-column">
                            <span class="text-dark fw-semibold" style="font-size: 0.85rem;">09121234567</span>
                            <span class="text-secondary" style="font-size: 0.75rem;">amihan@yahoo.com</span>
                        </div>
                    </td>
                    <td class="py-3">
                        <div class="d-flex flex-column">
                            <span class="text-dark" style="font-size: 0.85rem;">Oct 2, 1990 (35 yrs)</span>
                            <span class="text-secondary" style="font-size: 0.75rem;">La Union, PH</span>
                        </div>
                    </td>
                    <td class="py-3 text-center">
                        <span class="badge bg-light text-primary fw-semibold px-2.5 py-1.5" style="font-size: 0.75rem;">3 Records</span>
                    </td>
                    <td class="py-3 text-end">
                        <button class="btn btn-light btn-sm rounded-3 px-3 py-1.5 fw-semibold text-secondary" style="font-size: 0.75rem; border: 1px solid #e2e8f0;">View File</button>
                    </td>
                </tr>

                <tr class="border-bottom" style="border-color: #f8fafc !important;">
                    <td class="py-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="d-flex align-items-center justify-content-center rounded-circle fw-bold text-white shadow-sm" style="width: 36px; height: 36px; font-size: 0.85rem; background: linear-gradient(135deg, #ec4899, #db2777);">
                                PC
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0 text-dark" style="font-size: 0.9rem;">Pirena S. Cruz</h6>
                                <span class="text-secondary" style="font-size: 0.75rem;">ID: #5002</span>
                            </div>
                        </div>
                    </td>
                    <td class="py-3">
                        <div class="d-flex flex-column">
                            <span class="text-dark fw-semibold" style="font-size: 0.85rem;">09131234567</span>
                            <span class="text-secondary" style="font-size: 0.75rem;">pirenacruzz@gmail.com</span>
                        </div>
                    </td>
                    <td class="py-3">
                        <div class="d-flex flex-column">
                            <span class="text-dark" style="font-size: 0.85rem;">Feb 9, 1991 (35 yrs)</span>
                            <span class="text-secondary" style="font-size: 0.75rem;">Pampanga, PH</span>
                        </div>
                    </td>
                    <td class="py-3 text-center">
                        <span class="badge bg-light text-primary fw-semibold px-2.5 py-1.5" style="font-size: 0.75rem;">2 Records</span>
                    </td>
                    <td class="py-3 text-end">
                        <button class="btn btn-light btn-sm rounded-3 px-3 py-1.5 fw-semibold text-secondary" style="font-size: 0.75rem; border: 1px solid #e2e8f0;">View File</button>
                    </td>
                </tr>
                <tr class="border-bottom" style="border-color: #f8fafc !important;">
                    <td class="py-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="d-flex align-items-center justify-content-center rounded-circle fw-bold text-white shadow-sm" style="width: 36px; height: 36px; font-size: 0.85rem; background: linear-gradient(135deg, #ec4899, #db2777);">
                                AT
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0 text-dark" style="font-size: 0.9rem;">Alena T. Trismegistus</h6>
                                <span class="text-secondary" style="font-size: 0.75rem;">ID: #5003</span>
                            </div>
                        </div>
                    </td>
                    <td class="py-3">
                        <div class="d-flex flex-column">
                            <span class="text-dark fw-semibold" style="font-size: 0.85rem;">09141234567</span>
                            <span class="text-secondary" style="font-size: 0.75rem;">alenatrismegistus@gmail.com</span>
                        </div>
                    </td>
                    <td class="py-3">
                        <div class="d-flex flex-column">
                            <span class="text-dark" style="font-size: 0.85rem;">Nov 17, 1996 (29 yrs)</span>
                            <span class="text-secondary" style="font-size: 0.75rem;">Cainta, PH</span>
                        </div>
                    </td>
                    <td class="py-3 text-center">
                        <span class="badge bg-light text-primary fw-semibold px-2.5 py-1.5" style="font-size: 0.75rem;">1 Record</span>
                    </td>
                    <td class="py-3 text-end">
                        <button class="btn btn-light btn-sm rounded-3 px-3 py-1.5 fw-semibold text-secondary" style="font-size: 0.75rem; border: 1px solid #e2e8f0;">View File</button>
                    </td>
                </tr>

                <tr class="border-bottom" style="border-color: #f8fafc !important;">
                    <td class="py-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="d-flex align-items-center justify-content-center rounded-circle fw-bold text-white shadow-sm" style="width: 36px; height: 36px; font-size: 0.85rem; background: linear-gradient(135deg, #ec4899, #db2777);">
                                DM
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0 text-dark" style="font-size: 0.9rem;">Danaya H. Maria Clara</h6>
                                <span class="text-secondary" style="font-size: 0.75rem;">ID: #5004</span>
                            </div>
                        </div>
                    </td>
                    <td class="py-3">
                        <div class="d-flex flex-column">
                            <span class="text-dark fw-semibold" style="font-size: 0.85rem;">09151234567</span>
                            <span class="text-secondary" style="font-size: 0.75rem;">hotmariaclara@gmail.com</span>
                        </div>
                    </td>
                    <td class="py-3">
                        <div class="d-flex flex-column">
                            <span class="text-dark" style="font-size: 0.85rem;">Feb 2, 1985 (41 yrs)</span>
                            <span class="text-secondary" style="font-size: 0.75rem;">Rodriguez, PH</span>
                        </div>
                    </td>
                    <td class="py-3 text-center">
                        <span class="badge bg-light text-primary fw-semibold px-2.5 py-1.5" style="font-size: 0.75rem;">2 Records</span>
                    </td>
                    <td class="py-3 text-end">
                        <button class="btn btn-light btn-sm rounded-3 px-3 py-1.5 fw-semibold text-secondary" style="font-size: 0.75rem; border: 1px solid #e2e8f0;">View File</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
