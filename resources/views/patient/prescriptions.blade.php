@extends('patient.patientLayout')

@section('title', 'My Prescriptions')

@section('content')
    @if(session('success'))
        <div class="modal fade" id="refillSuccess" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 shadow">
                    <div class="modal-body text-center p-5">
                        <div class="text-success mb-3">
                            <svg width="48" height="48" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                            </svg>
                        </div>
                        <h3 class="fw-bold text-dark mb-2">Refill Requested!</h3>
                        <p class="text-muted mb-4 fs-6">{{ session('success') }}</p>
                        <button type="button" class="btn btn-success px-4 fw-semibold" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var myModal = new bootstrap.Modal(document.getElementById('refillSuccess'));
                myModal.show();
            });
        </script>
    @endif

    <div class="row mb-4">
        <div class="col-12 col-md-6">
            <div class="card shadow-sm text-center border-light rounded-4 h-100">
                <div class="card-body p-4">
                    <h6 class="text-muted text-uppercase fw-bold mb-3" style="letter-spacing: 1px;">
                        Active Prescriptions
                    </h6>
                    <h1 class="display-4 fw-bold text-primary mb-0">
                        {{ $activeP ?? 0 }}
                    </h1>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="card shadow-sm text-center border-light rounded-4 h-100">
                <div class="card-body p-4">
                    <h6 class="text-muted text-uppercase fw-bold mb-3" style="letter-spacing: 1px;">
                        Past Prescriptions
                    </h6>
                    <h1 class="display-4 fw-bold text-success mb-0">
                        {{ $pastP ?? 0 }}
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4 justify-content-center">
        <div class="col-12">
            <div class="hospital-card d-flex flex-column h-100" style="min-height: 240px;">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h3 class="fw-bold text-dark " style="letter-spacing: -0.5px;">Active Prescriptions</h3>
                </div>
                
                <div>
                    <div class="table-responsive">
                        <table class="table table-borderless align-middle mb-0">
                            <thead>
                                <tr class="border-bottom text-uppercase text-muted" style="font-size: 12px;">
                                    <th scope = "col"><center>Medication</center></th>
                                    <th scope = "col"><center>Dosage</center></th>
                                    <th scope = "col"><center>Quantity</center></th>
                                    <th scope = "col"><center>Instruction</center></th>
                                    <th scope = "col"><center>Refills Left</center></th>
                                    <th scope = "col"><center>Action</center></th>
                                </tr>
                            </thead>
                            <tbody class="text-dark fw-medium" style="font-size: 15px;">
                                @foreach($activePresc as $row)
                                <tr class="border-bottom text-center">
                                    <td class="text-nowrap">{{ $row->medication }}</td>
                                    <td class="text-nowrap">{{ $row->dosage }}</td>
                                    <td class="text-nowrap">{{ $row->qty }}</td>
                                    <td class="text-start">{{ $row->instruction }}</td>
                                    <td class="text-nowrap">{{ $row->{'refills_left'} }}</td>
                                    <td>
                                        <form action="{{ route('patient.requestRefill', ['patient' => $patient_id]) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="prescription_id" value="{{ $row->id }}">
                                            <input type="hidden" name="medication" value="{{ $row->medication }}">
                                            
                                            <button type="submit" class="btn btn-sm btn-outline-primary" style="font-size: 12px;">
                                                Ask for Refill
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 justify-content-center">
        <div class="col-12">
            <div class="hospital-card d-flex flex-column h-100" style="min-height: 240px;">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h3 class="fw-bold text-dark " style="letter-spacing: -0.5px;">Past Prescriptions</h3>
                </div>
                
                <div>
                    <div class="table-responsive">
                        <table class="table table-borderless align-middle mb-0">
                            <thead>
                                <tr class="border-bottom text-uppercase text-muted" style="font-size: 12px;">
                                    <th scope = "col"><center>Medication</center></th>
                                    <th scope = "col"><center>Dosage</center></th>
                                    <th scope = "col"><center>Quantity</center></th>
                                    <th scope = "col"><center>Start Date</center></th>
                                    <th scope = "col"><center>End Date</center></th>
                                </tr>
                            </thead>
                            <tbody class="text-dark fw-medium" style="font-size: 15px;">
                                @foreach($pastPresc as $row)
                                <tr class="border-bottom text-center">
                                    <td class="text-nowrap">{{ $row->medication }}</td>
                                    <td class="text-nowrap">{{ $row->dosage }}</td>
                                    <td class="text-nowrap">{{ $row->qty }}</td>
                                    <td class="text-nowrap">{{ $row->{'start_date'} }}</td>
                                    <td class="text-nowrap">{{ $row->{'end_date'} }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
<style>
    .hospital-card {
        background-color: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 24px;
    }
</style>
@endsection
