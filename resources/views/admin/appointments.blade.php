@extends('adminLayout')

@section('content')
<div class="card border-0 bg-white rounded-4 p-4 shadow-sm">
    <!-- Tab Navigation -->
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
        <ul class="nav nav-pills gap-2" id="appointmentTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active fw-semibold px-3 py-2" id="upcoming-tab" data-bs-toggle="tab" data-bs-target="#upcoming" type="button" role="tab" aria-controls="upcoming" aria-selected="true" style="font-size: 0.85rem; border-radius: 8px;">
                    Upcoming Appointments
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link fw-semibold px-3 py-2 text-secondary bg-transparent" id="past-tab" data-bs-toggle="tab" data-bs-target="#past" type="button" role="tab" aria-controls="past" aria-selected="false" style="font-size: 0.85rem; border-radius: 8px;">
                    Past Appointments & History
                </button>
            </li>
        </ul>
        <span class="text-secondary fw-medium" style="font-size: 0.8rem;">Sorted by Schedule Date</span>
    </div>

    <!-- Tab Contents -->
    <div class="tab-content" id="appointmentTabsContent">
        <!-- Upcoming Tab -->
        <div class="tab-pane fade show active" id="upcoming" role="tabpanel" aria-labelledby="upcoming-tab">
            <div class="table-responsive">
                <table class="table table-borderless align-middle mb-0">
                    <thead>
                        <tr class="border-bottom" style="border-color: #f1f5f9 !important;">
                            <th class="text-muted fw-bold text-uppercase pb-3" style="font-size: 0.75rem; letter-spacing: 0.5px;">Patient Name</th>
                            <th class="text-muted fw-bold text-uppercase pb-3" style="font-size: 0.75rem; letter-spacing: 0.5px;">Date / Time</th>
                            <th class="text-muted fw-bold text-uppercase pb-3" style="font-size: 0.75rem; letter-spacing: 0.5px;">Type</th>
                            <th class="text-muted fw-bold text-uppercase pb-3" style="font-size: 0.75rem; letter-spacing: 0.5px;">Assigned Doctor</th>
                            <th class="text-muted fw-bold text-uppercase pb-3 text-center" style="font-size: 0.75rem; letter-spacing: 0.5px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-bottom" style="border-color: #f8fafc !important;">
                            <td class="py-3 fw-bold text-dark">Amihan R. Batumbakal</td>
                            <td class="py-3 text-secondary" style="font-size: 0.9rem;">
                                <span class="text-dark d-block fw-medium" style="font-size: 0.85rem;">June 16, 2026</span>
                                <span class="text-secondary" style="font-size: 0.75rem;">11:00 AM</span>
                            </td>
                            
                            <td class="py-3">
                                <span class="badge rounded-pill px-3 py-1.5 fw-semibold" style="background-color: #f0f4ff; color: #0f5cfd; font-size: 0.75rem;">Teleconsult</span>
                            </td>
                            <td class="py-3">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rounded-circle bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center text-secondary fw-bold" style="width: 28px; height: 28px; font-size: 0.75rem;">JD</div>
                                    <span class="fw-semibold text-secondary" style="font-size: 0.9rem;">Dr. John Martin Doe</span>
                                </div>
                            </td>
                            <td class="py-3 text-center">
                                <a href="#" class="btn btn-sm fw-bold px-3 py-1.5 rounded-3" style="background-color: #f0f4ff; color: #0f5cfd; font-size: 0.8rem; border: none; transition: all 0.2s;">Start</a>
                                <a href="#" class="btn btn-sm fw-bold px-3 py-1.5 rounded-3 text-secondary" style="font-size: 0.8rem; border: none; transition: all 0.2s;">Manage</a>
                            </td>
                        </tr>
                        <tr class="border-bottom" style="border-color: #f8fafc !important;">
                            <td class="py-3 fw-bold text-dark">Pirena S. Cruz</td>
                            <td class="py-3 text-secondary" style="font-size: 0.9rem;">
                                <span class="text-dark d-block fw-medium" style="font-size: 0.85rem;">June 17, 2026</span>
                                <span class="text-secondary" style="font-size: 0.75rem;">9:00 AM</span>
                            </td>
                            
                            <td class="py-3">
                                <span class="badge rounded-pill px-3 py-1.5 fw-semibold" style="background-color: #e6fcf5; color: #0ca678; font-size: 0.75rem;">F2F Checkup</span>
                            </td>
                            <td class="py-3">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rounded-circle bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center text-secondary fw-bold" style="width: 28px; height: 28px; font-size: 0.75rem;">AS</div>
                                    <span class="fw-semibold text-secondary" style="font-size: 0.9rem;">Dr. Alice Santos</span>
                                </div>
                            </td>
                            <td class="py-3 text-center">
                                <a href="#" class="btn btn-sm fw-bold px-3 py-1.5 rounded-3" style="background-color: #f0f4ff; color: #0f5cfd; font-size: 0.8rem; border: none; transition: all 0.2s;">Start</a>
                                <a href="#" class="btn btn-sm fw-bold px-3 py-1.5 rounded-3 text-secondary" style="font-size: 0.8rem; border: none; transition: all 0.2s;">Manage</a>
                            </td>
                        </tr>
                        <tr class="border-bottom" style="border-color: #f8fafc !important;">
                            <td class="py-3 fw-bold text-dark">Alena T. Trismegistus</td>
                            <td class="py-3 text-secondary" style="font-size: 0.9rem;">
                                <span class="text-dark d-block fw-medium" style="font-size: 0.85rem;">June 18, 2026</span>
                                <span class="text-secondary" style="font-size: 0.75rem;">2:30 PM</span>
                            </td>
                            <td class="py-3">
                                <span class="badge rounded-pill px-3 py-1.5 fw-semibold" style="background-color: #f0f4ff; color: #0f5cfd; font-size: 0.75rem;">Teleconsult</span>
                            </td>
                            <td class="py-3">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rounded-circle bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center text-secondary fw-bold" style="width: 28px; height: 28px; font-size: 0.75rem;">SL</div>
                                    <span class="fw-semibold text-secondary" style="font-size: 0.9rem;">Dr. Sarah Lopez</span>
                                </div>
                            </td>
                            <td class="py-3 text-center">
                                <a href="#" class="btn btn-sm fw-bold px-3 py-1.5 rounded-3" style="background-color: #f0f4ff; color: #0f5cfd; font-size: 0.8rem; border: none; transition: all 0.2s;">Start</a>
                                <a href="#" class="btn btn-sm fw-bold px-3 py-1.5 rounded-3 text-secondary" style="font-size: 0.8rem; border: none; transition: all 0.2s;">Manage</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Past Tab -->
        <div class="tab-pane fade" id="past" role="tabpanel" aria-labelledby="past-tab">
            <div class="table-responsive">
                <table class="table table-borderless align-middle mb-0">
                    <thead>
                        <tr class="border-bottom" style="border-color: #f1f5f9 !important;">
                            <th class="text-muted fw-bold text-uppercase pb-3" style="font-size: 0.75rem; letter-spacing: 0.5px;">Patient Name</th>
                            <th class="text-muted fw-bold text-uppercase pb-3" style="font-size: 0.75rem; letter-spacing: 0.5px;">Date / Time</th>
                            <th class="text-muted fw-bold text-uppercase pb-3" style="font-size: 0.75rem; letter-spacing: 0.5px;">Type</th>
                            <th class="text-muted fw-bold text-uppercase pb-3" style="font-size: 0.75rem; letter-spacing: 0.5px;">Assigned Doctor</th>
                            <th class="text-muted fw-bold text-uppercase pb-3 text-center" style="font-size: 0.75rem; letter-spacing: 0.5px;">STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-bottom" style="border-color: #f8fafc !important;">
                            <td class="py-3 fw-bold text-dark">Danaya H. Maria Clara</td>
                            <td class="py-3 text-secondary" style="font-size: 0.9rem;">
                                <span class="text-dark d-block fw-medium" style="font-size: 0.85rem;">June 10, 2026</span>
                                <span class="text-secondary" style="font-size: 0.75rem;">11:00 AM</span>
                            </td>
                            
                            <td class="py-3">
                                <span class="badge rounded-pill px-3 py-1.5 fw-semibold" style="background-color: #f0f4ff; color: #0f5cfd; font-size: 0.75rem;">Teleconsult</span>
                            </td>
                            <td class="py-3">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rounded-circle bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center text-secondary fw-bold" style="width: 28px; height: 28px; font-size: 0.75rem;">JD</div>
                                    <span class="fw-semibold text-secondary" style="font-size: 0.9rem;">Dr. John Martin Doe</span>
                                </div>
                            </td>
                            <td class="py-3 text-center">
                                <span class="badge bg-success-subtle text-success fw-bold px-2.5 py-1.5" style="font-size: 0.75rem;">Done</span>
                            </td>
                        </tr>
                        <tr class="border-bottom" style="border-color: #f8fafc !important;">
                            <td class="py-3 fw-bold text-dark">James Bond I. Reyes</td>
                            <td class="py-3 text-secondary" style="font-size: 0.9rem;">
                                <span class="text-dark d-block fw-medium" style="font-size: 0.85rem;">June 8, 2026</span>
                                <span class="text-secondary" style="font-size: 0.75rem;">9:00 AM</span>
                            </td>
                            
                            <td class="py-3">
                                <span class="badge rounded-pill px-3 py-1.5 fw-semibold" style="background-color: #e6fcf5; color: #0ca678; font-size: 0.75rem;">F2F Checkup</span>
                            </td>
                            <td class="py-3">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rounded-circle bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center text-secondary fw-bold" style="width: 28px; height: 28px; font-size: 0.75rem;">AS</div>
                                    <span class="fw-semibold text-secondary" style="font-size: 0.9rem;">Dr. Alice Santos</span>
                                </div>
                            </td>
                            <td class="py-3 text-center">
                                 <span class="badge bg-danger-subtle text-danger fw-bold px-2.5 py-1.5" style="font-size: 0.75rem;">No Show</span>
                            </td>
                        </tr>
                        <tr class="border-bottom" style="border-color: #f8fafc !important;">
                            <td class="py-3 fw-bold text-dark">Alena T. Trismegistus</td>
                            <td class="py-3 text-secondary" style="font-size: 0.9rem;">
                                <span class="text-dark d-block fw-medium" style="font-size: 0.85rem;">June 6, 2026</span>
                                <span class="text-secondary" style="font-size: 0.75rem;">2:30 PM</span>
                            </td>
                            <td class="py-3">
                                <span class="badge rounded-pill px-3 py-1.5 fw-semibold" style="background-color: #f0f4ff; color: #0f5cfd; font-size: 0.75rem;">Teleconsult</span>
                            </td>
                            <td class="py-3">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rounded-circle bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center text-secondary fw-bold" style="width: 28px; height: 28px; font-size: 0.75rem;">SL</div>
                                    <span class="fw-semibold text-secondary" style="font-size: 0.9rem;">Dr. Sarah Lopez</span>
                                </div>
                            </td>
                            <td class="py-3 text-center">
                                <span class="badge bg-secondary-subtle text-secondary fw-bold px-2.5 py-1.5" style="font-size: 0.75rem;">Cancelled</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    /* Styling active navigation pills to look like modern tabs */
    #appointmentTabs .nav-link {
        transition: all 0.2s;
    }
    #appointmentTabs .nav-link.active {
        background-color: #f0f4ff !important;
        color: #0f5cfd !important;
    }
    #appointmentTabs .nav-link:not(.active):hover {
        background-color: #f8fafc !important;
        color: #1e293b !important;
    }
</style>
@endsection
