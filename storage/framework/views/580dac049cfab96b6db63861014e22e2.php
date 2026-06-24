<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PUP Care - Set an Appointment</title>
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
                    <a href="/patient/<?php echo e($patient_id); ?>/set-appointment" class="d-flex align-items-center gap-2 text-decoration-none px-3 py-2 rounded text-primary bg-primary bg-opacity-10 fw-semibold transition-all">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M 12 4 V 20 M 4 12 H 20"></path></svg>
                        <span class="small">Set Appointment</span>
                    </a>
                    <a href="/patient/<?php echo e($patient_id); ?>/records" class="nav-link-custom d-flex align-items-center gap-2 text-decoration-none px-3 py-2 rounded fw-medium transition-all">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <span class="small">My Medical Records</span>
                    </a>
                    <a href="/patient/<?php echo e($patient_id); ?>/prescriptions" class="nav-link-custom d-flex align-items-center gap-2 text-decoration-none px-3 py-2 rounded fw-medium transition-all">
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
                <div class="row g-4 justify-content-center">
                    <div class="col-12 col-lg-8 ">
                        <div class="hospital-card d-flex flex-column h-100" style="min-height: 480px;">
                            <div>
                                <h3 class="fw-bold text-dark mb-3 fs-5"  style="letter-spacing: -0.5px;"><center>Set an Appointment</center></h3>
                                
                                <form action="<?php echo e(route('patient.set', ['patient' => $patient_id])); ?>" method="POST">
                                <?php echo csrf_field(); ?>

                                <?php if($errors->any()): ?>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo e($error); ?>

                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                               
                                <div class="mb-3">
                                    <label for="doctor" class="form-label">
                                        Doctor
                                    </label>
                                    <select name="doctor_id" id="doctor" class="form-select" required>
                                        <option value="">Select Doctor</option>
                                        <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($doctor->doctor_id); ?>">
                                                Dr. <?php echo e($doctor->name); ?>   (<?php echo e($doctor->department); ?>)
                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label d-block">
                                        Visit Type
                                    </label>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="visit_type" id="inPerson" value="In Person" checked>
                                        <label class="form-check-label" for="inPerson">
                                            In Person
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="visit_type" id="teleconsult" value="Teleconsult">
                                        <label class="form-check-label" for="teleconsult">
                                            Teleconsult
                                        </label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="appointment_date" class="form-label">
                                        Date
                                    </label>
                                    <input type="date" name="appointment_date" id="appointment_date" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="appointment_time" class="form-label">
                                        Available Time
                                    </label>
                                    <select name="appointment_time" id="appointment_time" class="form-select" required>
                                        <option value="">Select Time</option>
                                        <option value="08:30:00">08:30</option>
                                        <option value="09:00:00">09:00</option>
                                        <option value="09:30:00">09:30</option>
                                        <option value="10:00:00">10:00</option>
                                        <option value="10:30:00">10:30</option>
                                        <option value="11:00:00">11:00</option>
                                        <option value="14:00:00">14:00</option>
                                        <option value="14:30:00">14:30</option>
                                        <option value="15:00:00">15:00</option>
                                        <option value="15:30:00">15:30</option>
                                        <option value="16:00:00">16:00</option>
                                        <option value="16:30:00">16:30</option>
                                        <option value="17:00:00">17:00</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="reason" class="form-label">
                                        Reason / Symptoms
                                    </label>
                                    <textarea name="symptom" id="symptom" rows="3" class="form-control" placeholder="Describe your symptoms..." required></textarea>
                                </div>

                                <div class="mb-4">
                                    <label for="notes" class="form-label">
                                        Additional Notes
                                    </label>
                                    <textarea name="notes" id="notes" rows="3" class="form-control" placeholder="Any additional information"></textarea>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <a href="<?php echo e(url()->previous()); ?>" class="btn btn-outline-secondary px-4">
                                        Cancel
                                    </a>

                                    <button type="submit" class="btn btn-primary px-4">
                                        Set Appointment
                                    </button>
                                </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"> </script>

    <script>
        document.addEventListener('DOMContentLoaded', function(){
            const doctorSelect = document.getElementById('doctor');
            const dateInput = document.getElementById('appointment_date');
            const timeSelect = document.getElementById('appointment_time');

            function updateTimeSlots() {
                const doctorId = doctorSelect.value;
                const date = dateInput.value;

                Array.from(timeSelect.options).forEach(option => {
                    if (option.value !== "") {
                        option.disabled = false;
                        option.text = option.value.substring(0, 5); 
                    }
                });

                if (doctorId && date){
                    fetch(`/patient/<?php echo e($patient_id); ?>/booked-slot?doctor_id=${doctorId}&date=${date}`)
                        .then(response => response.text()) 
                        .then(text => {
                            return JSON.parse(text); 
                        })
                        .then(bookedTimes => {
                            Array.from(timeSelect.options).forEach(option => {
                                if (bookedTimes.includes(option.value)) {
                                    option.disabled = true;
                                    option.text += "                    --- Not Available ---";
                                }
                            });
                        })
                        .catch(error => console.error("Error fetching times:", error));
                }
            }
            doctorSelect.addEventListener('change', updateTimeSlots);
            dateInput.addEventListener('change', updateTimeSlots);
            updateTimeSlots();
        });
    </script>
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
</style><?php /**PATH C:\Users\HP\Documents\Visual Studio Projects\webdev_patient\resources\views/patient/appointment.blade.php ENDPATH**/ ?>