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
                    <h4 class="fw-bold mb-0 text-dark">{{ number_format($totalDoctors) }}</h4>
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
                    <h4 class="fw-bold mb-0 text-dark">{{ number_format($onDutyToday) }}</h4>
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
                    <h4 class="fw-bold mb-0 text-dark">{{ number_format($pendingAppointments) }}</h4>
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
                    <h4 class="fw-bold mb-0 text-dark">{{ number_format($departmentsCount) }}</h4>
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
                @foreach($groupedDoctors as $dept => $docs)
                    <option value="{{ Str::slug($dept) }}">{{ $dept }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Grouped Doctors Container -->
    <div id="doctorsContainer">
        @forelse($groupedDoctors as $dept => $docs)
            @php
                $badgeClasses = [
                    'Pediatrics' => 'bg-primary-subtle text-primary',
                    'Dermatology' => 'bg-success-subtle text-success',
                    'Cardiology' => 'bg-info-subtle text-info',
                    'General Surgery' => 'bg-warning-subtle text-warning',
                    'Surgery' => 'bg-warning-subtle text-warning',
                    'Orthopedics' => 'bg-secondary-subtle text-secondary',
                    'Hematology' => 'bg-danger-subtle text-danger'
                ];
                $badgeClass = $badgeClasses[$dept] ?? 'bg-light text-dark';
            @endphp
            <div class="specialty-group mb-4" data-department="{{ Str::slug($dept) }}">
                <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom" style="border-color: #f1f5f9 !important;">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge {{ $badgeClass }} fw-bold px-3 py-2 rounded-3" style="font-size: 0.8rem;">{{ $dept }}</span>
                        <span class="text-secondary small">{{ $docs->count() }} {{ Str::plural('Specialist', $docs->count()) }}</span>
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
                            @foreach($docs as $doc)
                                @php
                                    // Initials
                                    $words = explode(' ', preg_replace('/^(dr\.|dr)\s+/i', '', $doc->name));
                                    $initials = '';
                                    foreach ($words as $w) {
                                        $initials .= strtoupper(substr($w, 0, 1));
                                    }
                                    $initials = substr($initials, 0, 2);

                                    // Status styling
                                    $status = $doc->status;
                                    $statusBg = ($status === 'On Duty') ? '#ecfdf5' : '#fff1f2';
                                    $statusColor = ($status === 'On Duty') ? '#10b981' : '#f43f5e';
                                @endphp
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="d-flex align-items-center justify-content-center rounded-circle fw-bold text-white shadow-sm" style="width: 32px; height: 32px; font-size: 0.8rem; background: linear-gradient(135deg, #3b82f6, #1d4ed8);">
                                                {{ $initials ?: 'DR' }}
                                            </div>
                                            <div>
                                                <h6 class="fw-bold mb-0 text-dark doctor-name" style="font-size: 0.85rem;">Dr. {{ preg_replace('/^(dr\.|dr)\s+/i', '', $doc->name) }}</h6>
                                                <span class="text-secondary" style="font-size: 0.7rem;">ID: #{{ $doc->doctor_id }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-dark d-block" style="font-size: 0.8rem;">{{ $doc->phone }}</span>
                                        <span class="text-secondary" style="font-size: 0.7rem;">{{ $doc->email }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-light text-dark fw-semibold px-2 py-1" style="font-size: 0.7rem;">{{ $doc->patient_count }} {{ Str::plural('Patient', $doc->patient_count) }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge rounded-pill px-2 py-1 fw-semibold" style="background-color: {{ $statusBg }}; color: {{ $statusColor }}; font-size: 0.7rem;">{{ $status }}</span>
                                    </td>
                                    <td class="text-end">
                                        <button class="btn btn-light btn-sm rounded-3 px-2.5 py-1 text-secondary" style="font-size: 0.7rem; border: 1px solid #e2e8f0;">Manage</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @empty
            <div class="text-center py-5 text-secondary">
                <i class="bi bi-people fs-2 d-block mb-2 text-muted"></i>
                No doctors registered in database.
            </div>
        @endforelse
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
