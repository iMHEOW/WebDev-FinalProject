@extends('layout')

@section('content')
<div class="container-fluid p-0">

    <div class="mb-4">
        <h2 class="fw-bold text-dark mb-1">Patient Directory</h2>
        <p class="text-secondary mb-0 small">Manage and look up clinical charts for your assigned patients.</p>
    </div>

    <div class="hospital-card">
        <div class="table-responsive">
            <table class="table table-hover align-middle border-0 mb-0">
                <thead class="table-light border-0">
                    <tr class="text-secondary text-uppercase" style="font-size: 11px; letter-spacing: 0.5px;">
                        <th class="border-0 py-3 ps-3">Patient ID</th>
                        <th class="border-0 py-3">Full Name</th>
                        <th class="border-0 py-3">Email Address</th>
                        <th class="border-0 py-3">System Access Role</th>
                        <th class="border-0 py-3 text-end pe-3">Action</th>
                    </tr>
                </thead>
                <tbody class="border-0" style="font-size: 13.5px;">
                    @foreach($patients as $p)
                        <tr class="border-bottom">
                            <td class="py-3 ps-3 fw-bold text-secondary">
                                #{{ $p->id }}
                            </td>
                            <td class="py-3 fw-bold text-dark">
                                {{ $p->name }}
                            </td>
                            <td class="py-3 text-secondary">
                                {{ $p->email }}
                            </td>
                            <td class="py-3">
                                <span class="badge bg-secondary text-white rounded-2 px-2.5 py-1 small">
                                    {{ $p->role }}
                                </span>
                            </td>
                            <td class="py-3 text-end pe-3">
                                <a href="/doctor/patients" class="btn btn-sm btn-blue px-3 rounded-3 py-1.5 small fw-bold">
                                    View Profile Chart →
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection