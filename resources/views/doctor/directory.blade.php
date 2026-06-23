@extends('layout')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-1">Patient Directory Master Roster</h2>
            <p class="text-secondary mb-0">Review clinical registration records and launch complete historic files.</p>
        </div>
        <a href="{{ route('doctor.consultation') }}" class="btn btn-primary px-4 shadow-sm">+ Open New Consultation</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm mb-4" role="alert">
            <strong>✨ Success!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm mb-4 p-3 bg-white">
        <div class="row align-items-center">
            <div class="col-md-5">
                <input type="text" id="patientSearch" class="form-control bg-light" placeholder="Search patient registry by name...">
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light text-uppercase font-monospace small border-bottom">
                    <tr>
                        <th class="ps-4 py-3 text-secondary">Patient Full Name</th>
                        <th class="py-3 text-secondary">Age</th>
                        <th class="py-3 text-secondary">Sex</th>
                        <th class="py-3 text-secondary">Contact Line</th>
                        <th class="py-3 text-secondary">Primary Diagnosis Notes</th>
                        <th class="pe-4 py-3 text-end text-secondary">Action Panel</th>
                    </tr>
                </thead>
                <tbody id="directoryTable">
                    @forelse($patients as $patient)
                        <tr>
                            <td class="ps-4 py-3">
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; font-weight: bold;">
                                        {{ strtoupper(substr($patient->first_name, 0, 1)) }}{{ strtoupper(substr($patient->last_name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <a href="{{ route('doctor.patient.profile', $patient->id) }}" class="text-decoration-none fw-bold text-primary d-block">
                                            {{ $patient->first_name }} {{ $patient->last_name }}
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3 fw-medium text-dark">{{ $patient->age }} yrs</td>
                            <td class="py-3">
                                <span class="badge @if($patient->sex == 'Male') bg-info bg-opacity-10 text-info @else bg-danger bg-opacity-10 text-danger @endif px-2.5 py-1.5 fw-semibold">
                                    {{ $patient->sex }}
                                </span>
                            </td>
                            <td class="py-3 font-monospace text-secondary">{{ $patient->phone_number }}</td>
                            <td class="py-3 text-muted text-truncate" style="max-width: 240px;">{{ $patient->diagnosis }}</td>
                            <td class="pe-4 py-3 text-end">
                                <a href="{{ route('doctor.patient.profile', $patient->id) }}" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
                                    Open Chart File 📂
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">No patient records found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.getElementById('patientSearch').addEventListener('keyup', function() {
        let filterValue = this.value.toLowerCase().trim();
        let tableRows = document.querySelectorAll('#directoryTable tr');

        tableRows.forEach(row => {
            if (row.cells.length < 2) return;
            let nameText = row.cells[0].textContent.toLowerCase();
            row.style.display = nameText.includes(filterValue) ? '' : 'none';
        });
    });
</script>
@endsection