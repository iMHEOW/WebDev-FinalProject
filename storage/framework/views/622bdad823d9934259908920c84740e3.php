<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PUP Care - My Prescriptions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body class="antialiased">

    <div class="d-flex vh-100 overflow-hidden">
        
        <aside class="bg-white border-end p-4 d-flex flex-column justify-content-between h-100 flex-shrink-0" style="width: 256px;">
            <div>
                <div class="d-flex align-items-center gap-2 mb-4 px-2">
                    <div class="bg-primary text-white p-2 rounded shadow-sm d-flex">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <span class="fs-5 fw-bold text-dark" style="letter-spacing: -0.5px;">PUP Care</span>
                </div>

                <nav class="d-flex flex-column gap-1">
                    <a href="/patient/<?php echo e($patient_id); ?>/dashboard" class="nav-link-custom d-flex align-items-center gap-2 text-decoration-none px-3 py-2 rounded fw-medium transition-all">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"></path></svg>
                        <span class="small">Home</span>
                    </a>
                    <a href="/patient/<?php echo e($patient_id); ?>/set-appointment" class="nav-link-custom d-flex align-items-center gap-2 text-decoration-none px-3 py-2 rounded fw-medium transition-all">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M 12 4 V 20 M 4 12 H 20"></path></svg>
                        <span class="small">Set Appointment</span>
                    </a>
                    <a href="/patient/<?php echo e($patient_id); ?>/records" class="nav-link-custom d-flex align-items-center gap-2 text-decoration-none px-3 py-2 rounded fw-medium transition-all">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <span class="small">My Medical Records</span>
                    </a>
                    <a href="/patient/<?php echo e($patient_id); ?>/prescriptions" class="d-flex align-items-center gap-2 text-decoration-none px-3 py-2 rounded text-primary bg-primary bg-opacity-10 fw-semibold transition-all">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span class="small">My Prescriptions</span>
                    </a>
                </nav>
            </div>

            <div>
                <a href="#" class="logout-link d-flex align-items-center gap-2 text-decoration-none px-3 py-2 rounded fw-medium transition-all">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    <span class="small">Log out</span>
                </a>
            </div>
        </aside>

        <div class="flex-grow-1 d-flex flex-column h-100 overflow-hidden">
            
        <header class="bg-white border-bottom d-flex align-items-center justify-content-between px-4 px-md-5 flex-shrink-0" style="height: 80px;">
                
                <div class="position-relative" style="width: 400px;"> </div>

                <div class="d-flex align-items-center gap-4">
        
                    <div class="d-flex align-items-center gap-3 border-start ps-4">
                        <div class="text-end">
                            <p class="mb-0 small fw-bold text-dark lh-1"><?php echo e($patientName); ?></p>
                            <p class="mb-0 text-muted fw-medium" style="font-size: 12px;">Patient</p>
                        </div>
                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold shadow-sm" style="width: 40px; height: 40px;">
                            <i class="bi bi-person fs-4"></i>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-grow-1 overflow-auto p-4 p-md-5">
                <?php if(session('success')): ?>
                    <div class="modal fade" id="refillSuccess" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0 shadow">
                                <div class="modal-body text-center p-5">
                                    <div class="text-success mb-3">
                                        <i class="bi bi-check-circle-fill" style="font-size: 3rem;"></i>
                                    </div>
                                    <h3 class="fw-bold text-dark mb-2"">Refill Requested!</h3>
                                    <p class="text-muted mb-4 fs-6"><?php echo e(session('success')); ?></p>
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
                <?php endif; ?>

                <div class="row mb-4">

                    <div class="col-12 col-md-6">
                        <div class="card shadow-sm text-center border-light rounded-4 h-100">
                            <div class="card-body p-4">
                                <h6 class="text-muted text-uppercase fw-bold mb-3" style="letter-spacing: 1px;">
                                    Active Prescriptions
                                </h6>
                                <h1 class="display-4 fw-bold text-primary mb-0">
                                    <?php echo e($activeP ?? 0); ?>

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
                                    <?php echo e($pastP ?? 0); ?>

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
                                                <?php $__currentLoopData = $activePresc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="border-bottom text-center">
                                                    <td class="text-nowrap"><?php echo e($row->Medication); ?></td>
                                                    <td class="text-nowrap"><?php echo e($row->Dosage); ?></td>
                                                    <td class="text-nowrap"><?php echo e($row->Qty); ?></td>
                                                    <td class="text-start"><?php echo e($row->Instruction); ?></td>
                                                    <td class="text-nowrap"><?php echo e($row->{'Refills Left'}); ?></td>
                                                    <td>
                                                        <form action="<?php echo e(route('patient.requestRefill', ['patient' => $patient_id])); ?>" method="POST">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="hidden" name="prescription_id" value="<?php echo e($row->ID); ?>">
                                                            <input type="hidden" name="medication" value="<?php echo e($row->Medication); ?>">
                                                            
                                                            <button type="submit" class="btn btn-sm btn-outline-primary" style="font-size: 12px;">
                                                                Ask for Refill
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                                <?php $__currentLoopData = $pastPresc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="border-bottom text-center">
                                                    <td class="text-nowrap"><?php echo e($row->Medication); ?></td>
                                                    <td class="text-nowrap"><?php echo e($row->Dosage); ?></td>
                                                    <td class="text-nowrap"><?php echo e($row->Qty); ?></td>
                                                    <td class="text-nowrap"><?php echo e($row->{'Start Date'}); ?></td>
                                                    <td class="text-nowrap"><?php echo e($row->{'End Date'}); ?></td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



</body>
</html>

<style>
    body {
        background-color: #f0f4fa;
        color: #475569;
        font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", "Noto Sans", "Liberation Sans", Arial, sans-serif;
    }

    .transition-all {
        transition: all 0.2s ease-in-out;
    }

    .nav-link-custom {
        color: #94a3b8; 
    }
    .nav-link-custom:hover {
        background-color: #f8fafc; 
        color: #334155; 
    }

    .logout-link {
        color: #94a3b8; 
    }
    .logout-link:hover {
        background-color: #fff1f2; 
        color: #e11d48; 
    }

    .search-input:focus {
        background-color: #ffffff !important;
        border-color: #e2e8f0;
        box-shadow: 0 0 0 1px #e2e8f0;
    }
    
    .icon-hover {
        color: #94a3b8 !important;
    }
    .icon-hover:hover {
        color: #475569 !important;
    }

    .hospital-card {
        background-color: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 24px;
    }

    .badge-indigo {
        background-color: #eef2ff;
        color: #4f46e5;
    }
    .badge-emerald {
        background-color: #ecfdf5;
        color: #059669;
    }
    .badge-amber {
        background-color: #fef3c7;
        color: #92400e;
        font-weight: 700;
    }

    .btn-start {
        font-size: 12px;
        font-weight: 700;
        background-color: #eff6ff;
        color: #2563eb;
        padding: 6px 12px;
        border-radius: 8px;
        transition: background-color 0.2s;
    }
    .btn-start:hover {
        background-color: #dbeafe;
        color: #2563eb;
    }

    .btn-blue {
        background-color: #2563eb;
        color: #ffffff;
        font-weight: 600;
        padding: 12px 24px;
        border-radius: 12px;
        text-align: center;
        text-decoration: none;
        transition: background-color 0.2s;
    }

    .btn-blue:hover {
        background-color: #1d4ed8;
        color: #ffffff;
    }

    .text-muted {
        color: #94a3b8 !important; 
    }
    
    tbody tr.border-bottom {
        border-color: #f8fafc !important;
    }
</style><?php /**PATH C:\Users\HP\Documents\Visual Studio Projects\webdev_patient\resources\views/patient/prescriptions.blade.php ENDPATH**/ ?>