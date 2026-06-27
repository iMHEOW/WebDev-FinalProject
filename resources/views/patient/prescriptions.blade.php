@extends('patient.patientLayout')

@section('title', 'My Prescriptions')

@section('content')
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
