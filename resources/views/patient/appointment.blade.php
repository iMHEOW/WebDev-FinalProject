@extends('patient.patientLayout')

@section('title', 'Set an Appointment')

@section('content')
<div class="row g-4 justify-content-center">
    <div class="col-12 col-lg-8">
        <div class="hospital-card d-flex flex-column h-100" style="min-height: 480px;">
            <div>
                <h3 class="fw-bold text-dark mb-3 fs-5" style="letter-spacing: -0.5px;"><center>Set an Appointment</center></h3>
                
                <form action="{{ route('patient.set', ['patient' => $patient_id]) }}" method="POST">
                    @csrf

                    @if($errors->any())
                        @foreach($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                        @endforeach
                    @endif
                   
                    <div class="mb-3">
                        <label for="doctor" class="form-label">
                            Doctor
                        </label>
                        <select name="doctor_id" id="doctor" class="form-select" required>
                            <option value="">Select Doctor</option>
                            @foreach($doctors as $doctor)
                                <option value="{{ $doctor->doctor_id }}">
                                    Dr. {{ $doctor->name }}   ({{$doctor->department }})
                                </option>
                            @endforeach
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
                        <label for="symptom" class="form-label">
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
                        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary px-4">
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
@endsection

@section('scripts')
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
                fetch(`/patient/{{ $patient_id }}/booked-slot?doctor_id=${doctorId}&date=${date}`)
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