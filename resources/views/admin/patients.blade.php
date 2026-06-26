@extends('admin.adminLayout')

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
                    <h4 class="fw-bold mb-0 text-dark">{{ number_format($totalPatients) }}</h4>
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
                    <h4 class="fw-bold mb-0 text-dark">{{ number_format($malePatients) }}</h4>
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
                    <h4 class="fw-bold mb-0 text-dark">{{ number_format($femalePatients) }}</h4>
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
                    <h4 class="fw-bold mb-0 text-dark">{{ number_format($consultationsCount) }}</h4>
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
                <input type="text" id="patientSearch" class="form-control bg-light border-0 py-2" placeholder="Search by name, contact, address..." aria-describedby="search-addon" style="font-size: 0.85rem; border-radius: 0 10px 10px 0;">
            </div>
        </div>
        <div class="col-md-6 col-lg-3 ms-auto">
            <select id="sortVisit" class="form-select bg-light border-0 py-2" style="font-size: 0.85rem; border-radius: 10px; color: #64748b;">
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
                @forelse($patients as $patient)
                    @php
                        $words = explode(' ', $patient->name);
                        $initials = '';
                        foreach ($words as $w) {
                            $initials .= strtoupper(substr($w, 0, 1));
                        }
                        $initials = substr($initials, 0, 2);

                        $dob = \Carbon\Carbon::parse($patient->dob);
                        $age = $dob->age;
                        $formattedDob = $dob->format('M j, Y');
                    @endphp
                    <tr class="border-bottom patient-row" data-last-visit="{{ $patient->last_visit ?? '' }}" style="border-color: #f8fafc !important;">
                        <td class="py-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="d-flex align-items-center justify-content-center rounded-circle fw-bold text-white shadow-sm {{ $patient->gender === 'Female' ? 'bg-female' : 'bg-male' }}" 
                                    style="width: 36px; height: 36px; font-size: 0.85rem;">
                                    {{ $initials }}
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-0 text-dark patient-name" style="font-size: 0.9rem;">{{ $patient->name }}</h6>
                                    <span class="text-secondary d-block" style="font-size: 0.75rem;">ID: #{{ $patient->patient_id }}</span>
                                    @if($patient->last_visit)
                                        <span class="text-muted d-block" style="font-size: 0.72rem; margin-top: 1px;">Last Visit: {{ \Carbon\Carbon::parse($patient->last_visit)->format('M j, Y') }}</span>
                                    @else
                                        <span class="text-muted d-block" style="font-size: 0.72rem; margin-top: 1px;">Last Visit: Never</span>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="py-3">
                            <div class="d-flex flex-column">
                                <span class="text-dark fw-semibold" style="font-size: 0.85rem;">{{ $patient->phone_no }}</span>
                                <span class="text-secondary" style="font-size: 0.75rem;">{{ $patient->email }}</span>
                            </div>
                        </td>
                        <td class="py-3">
                            <div class="d-flex flex-column">
                                <span class="text-dark" style="font-size: 0.85rem;">{{ $formattedDob }} ({{ $age }} yrs)</span>
                                <span class="text-secondary" style="font-size: 0.75rem;">{{ $patient->address }}</span>
                            </div>
                        </td>
                        <td class="py-3 text-center">
                            <span class="badge bg-light text-primary fw-semibold px-2.5 py-1.5" style="font-size: 0.75rem;">
                                {{ $patient->records_count }} {{ Str::plural('Record', $patient->records_count) }}
                            </span>
                        </td>
                        <td class="py-3 text-end">
                            <a href="{{ route('admin.patient.profile', $patient->patient_id) }}" class="btn btn-light btn-sm rounded-3 px-3 py-1.5 fw-semibold text-secondary" style="font-size: 0.75rem; border: 1px solid #e2e8f0; text-decoration: none;">View File</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-5 text-secondary">
                            <i class="bi bi-people fs-2 d-block mb-2 text-muted"></i>
                            No patients found in database.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('patientSearch');
    const sortSelect = document.getElementById('sortVisit');
    const tbody = document.querySelector('tbody');
    const originalRows = Array.from(tbody.querySelectorAll('.patient-row'));

    function filterAndSort() {
        const query = searchInput.value.toLowerCase().trim();
        const sortValue = sortSelect.value;

        let rows = [...originalRows];

        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            if (text.includes(query)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });

        if (sortValue === 'newest') {
            rows.sort((a, b) => {
                const dateA = a.getAttribute('data-last-visit');
                const dateB = b.getAttribute('data-last-visit');
                if (!dateA) return 1;
                if (!dateB) return -1;
                return new Date(dateB) - new Date(dateA);
            });
        } else if (sortValue === 'oldest') {
            rows.sort((a, b) => {
                const dateA = a.getAttribute('data-last-visit');
                const dateB = b.getAttribute('data-last-visit');
                if (!dateA) return 1;
                if (!dateB) return -1;
                return new Date(dateA) - new Date(dateB);
            });
        }

        rows.forEach(row => tbody.appendChild(row));
    }

    searchInput.addEventListener('input', filterAndSort);
    sortSelect.addEventListener('change', filterAndSort);
});
</script>

<style>
.bg-female { background: linear-gradient(135deg, #ec4899, #db2777); }
.bg-male { background: linear-gradient(135deg, #3b82f6, #1d4ed8); }
</style>

@endsection
