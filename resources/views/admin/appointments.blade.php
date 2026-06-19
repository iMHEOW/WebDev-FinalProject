@extends('adminLayout')

@section('content')
<div class="card border-0 bg-white rounded-4 p-4 shadow-sm">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="fw-bold mb-0 text-dark" style="letter-spacing: -0.5px;">Upcoming Appointments</h5>
        <span class="text-secondary fw-semibold" style="font-size: 0.8rem;">Sorted by Date</span>
    </div>

    <div class="table-responsive">
        <table class="table table-borderless align-middle mb-0">
            <thead>
                <tr class="border-bottom" style="border-color: #f1f5f9 !important;">
                    <th class="text-muted fw-bold text-uppercase pb-3" style="font-size: 0.75rem; letter-spacing: 0.5px;">Patient</th>
                    <th class="text-muted fw-bold text-uppercase pb-3" style="font-size: 0.75rem; letter-spacing: 0.5px;">Date</th>
                    <th class="text-muted fw-bold text-uppercase pb-3" style="font-size: 0.75rem; letter-spacing: 0.5px;">Time</th>
                    <th class="text-muted fw-bold text-uppercase pb-3" style="font-size: 0.75rem; letter-spacing: 0.5px;">Type</th>
                    <th class="text-muted fw-bold text-uppercase pb-3" style="font-size: 0.75rem; letter-spacing: 0.5px;">Assigned Doctor</th>
                    <th class="text-muted fw-bold text-uppercase pb-3 text-end" style="font-size: 0.75rem; letter-spacing: 0.5px;">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Row 1 -->
                <tr class="border-bottom" style="border-color: #f8fafc !important;">
                    <td class="py-3 fw-bold text-dark">123</td>
                    <td class="py-3 text-secondary" style="font-size: 0.9rem;">June 16, 2026</td>
                    <td class="py-3 text-primary fw-semibold" style="font-size: 0.9rem;">09:40 AM</td>
                    <td class="py-3">
                        <span class="badge rounded-pill px-3 py-1.5 fw-semibold" style="background-color: #f0f4ff; color: #0f5cfd; font-size: 0.75rem;">Teleconsult</span>
                    </td>
                    <td class="py-3">
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center text-secondary fw-bold" style="width: 28px; height: 28px; font-size: 0.75rem;">DM</div>
                            <span class="fw-semibold text-secondary" style="font-size: 0.9rem;">Dr. Mamun</span>
                        </div>
                    </td>
                    <td class="py-3 text-end">
                        <a href="#" class="btn btn-sm fw-bold px-3 py-1.5 rounded-3" style="background-color: #f0f4ff; color: #0f5cfd; font-size: 0.8rem; border: none; transition: all 0.2s;">Start</a>
                    </td>
                </tr>
                <tr class="border-bottom" style="border-color: #f8fafc !important;">
                    <td class="py-3 fw-bold text-dark">Juan Dela Cruz</td>
                    <td class="py-3 text-secondary" style="font-size: 0.9rem;">June 16, 2026</td>
                    <td class="py-3 text-primary fw-semibold" style="font-size: 0.9rem;">10:00 AM</td>
                    <td class="py-3">
                        <span class="badge rounded-pill px-3 py-1.5 fw-semibold" style="background-color: #e6fcf5; color: #0ca678; font-size: 0.75rem;">F2F</span>
                    </td>
                    <td class="py-3">
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center text-secondary fw-bold" style="width: 28px; height: 28px; font-size: 0.75rem;">DR</div>
                            <span class="fw-semibold text-secondary" style="font-size: 0.9rem;">Dr. Rebecca</span>
                        </div>
                    </td>
                    <td class="py-3 text-end">
                        <a href="#" class="btn btn-sm fw-bold px-3 py-1.5 rounded-3" style="background-color: #f0f4ff; color: #0f5cfd; font-size: 0.8rem; border: none; transition: all 0.2s;">Start</a>
                    </td>
                </tr>

                <tr class="border-bottom" style="border-color: #f8fafc !important;">
                    <td class="py-3 fw-bold text-dark">Ako</td>
                    <td class="py-3 text-secondary" style="font-size: 0.9rem;">June 17, 2026</td>
                    <td class="py-3 text-primary fw-semibold" style="font-size: 0.9rem;">02:30 PM</td>
                    <td class="py-3">
                        <span class="badge rounded-pill px-3 py-1.5 fw-semibold" style="background-color: #f0f4ff; color: #0f5cfd; font-size: 0.75rem;">Teleconsult</span>
                    </td>
                    <td class="py-3">
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center text-secondary fw-bold" style="width: 28px; height: 28px; font-size: 0.75rem;">DE</div>
                            <span class="fw-semibold text-secondary" style="font-size: 0.9rem;">Dr. Emon</span>
                        </div>
                    </td>
                    <td class="py-3 text-end">
                        <a href="#" class="btn btn-sm fw-bold px-3 py-1.5 rounded-3" style="background-color: #f0f4ff; color: #0f5cfd; font-size: 0.8rem; border: none; transition: all 0.2s;">Start</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
