@extends('patient.patientLayout')

@section('title', 'My Medical Records')

@section('content')
    <div class="row mb-4">
        <div class="col-12 col-md-6">
            <div class="card shadow-sm text-center border-light rounded-4 h-100">
                <div class="card-body p-4">
                    <h6 class="text-muted text-uppercase fw-bold mb-3" style="letter-spacing: 1px;">
                        New Records This Month
                    </h6>
                    <h1 class="display-4 fw-bold text-primary mb-0">
                        {{ $monthRecord ?? 0 }}
                    </h1>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="card shadow-sm text-center border-light rounded-4 h-100">
                <div class="card-body p-4">
                    <h6 class="text-muted text-uppercase fw-bold mb-3" style="letter-spacing: 1px;">
                        Total Records
                    </h6>
                    <h1 class="display-4 fw-bold text-success mb-0">
                        {{ $totalRecord ?? 0 }}
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 justify-content-center">
        <div class="col-12">
            <div class="hospital-card d-flex flex-column h-100" style="min-height: 300px;">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h2 class="fw-bold text-dark " style="letter-spacing: -0.5px;">My Medical Records</h2>
                </div>

                <nav class="navbar bg-transparent mb-3">
                    <div class="container-fluid px-0">
                        <form method="GET" action="{{ route('searchRecord', ['patient' => $patient_id]) }}" class="d-flex w-100" role="search" style="max-width: 400px;">
                            <div class="input-group me-2">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="bi bi-search"></i>
                                </span>
                                <input class="form-control border-start-0" type="search" aria-label="Search" name="param" value="{{ request('param') }}" placeholder="Enter keyword">
                            </div>
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </nav>    
                
                <div>                             
                    <div class="table-responsive">
                        <table class="table table-borderless align-middle mb-0">
                            <thead>
                                <tr class="border-bottom text-uppercase text-muted" style="font-size: 12px;">
                                    <th scope="col"><center>Date</center></th>
                                    <th scope="col"><center>Type</center></th>
                                    <th scope="col"><center>Doctor</center></th>
                                    <th scope="col"><center>Summary</center></th>
                                </tr>
                            </thead>
                            <tbody class="text-dark fw-medium" style="font-size: 14px;">
                                @foreach($medrecord as $row)
                                <tr class="border-bottom text-center">
                                    <td class="text-nowrap">{{ $row->date }}</td>
                                    <td class="text-nowrap">{{ $row->type }}</td>
                                    <td class="text-nowrap">{{ $row->doctor }}</td>
                                    <td class="text-start">{{ $row->summary }}</td> 
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
