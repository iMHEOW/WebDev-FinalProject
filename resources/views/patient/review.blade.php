@extends('patient.patientLayout')

@section('title', 'Give a Review')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card border-0 bg-white rounded-4 p-4 p-md-5 shadow-sm">
            <div class="text-center mb-4">
                <div class="bg-primary-subtle text-primary rounded-circle p-3 d-inline-flex mb-3 shadow-sm" style="background-color: rgba(15, 92, 253, 0.08) !important;">
                    <i class="bi bi-star-fill fs-3 text-primary"></i>
                </div>
                <h4 class="fw-bold text-dark mb-1" style="letter-spacing: -0.5px;">Share Your Experience</h4>
                <p class="text-secondary mb-0" style="font-size: 0.88rem;">Your feedback helps us improve the quality of care and services we provide.</p>
            </div>

            <form action="{{ route('patient.storeReview', $patient_id) }}" method="POST" id="reviewForm">
                @csrf

                <div class="mb-4 text-center">
                    <label class="form-label fw-bold text-secondary d-block mb-3" style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Your Rating</label>
                    <div class="d-flex justify-content-center gap-2 star-rating-container" style="font-size: 2.2rem;">
                        <input type="hidden" name="rating" id="ratingInput" value="5">
                        @for($i = 1; $i <= 5; $i++)
                            <i class="bi bi-star-fill text-warning star-btn cursor-pointer transition-all" data-star-value="{{ $i }}" style="cursor: pointer;"></i>
                        @endfor
                    </div>
                    <div class="mt-2">
                        <span id="ratingDescription" class="fw-semibold text-primary" style="font-size: 0.9rem;">Excellent!</span>
                    </div>
                    @error('rating')
                        <div class="text-danger small mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="comments" class="form-label fw-bold text-secondary mb-2" style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Review Comments</label>
                    <textarea class="form-control rounded-3 p-3 text-dark transition-all" 
                              name="comments" 
                              id="comments" 
                              rows="5" 
                              placeholder="Tell us what you liked, or where we can improve..."
                              style="font-size: 0.9rem; border-color: #e2e8f0; resize: none;"
                              required>{{ old('comments') }}</textarea>
                    @error('comments')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-3 mt-4">
                    <a href="{{ route('patient.dashboard', $patient_id) }}" class="btn btn-light flex-grow-1 rounded-3 py-2.5 fw-semibold text-secondary" style="font-size: 0.9rem; background-color: #f1f5f9; border: none;">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary flex-grow-1 rounded-3 py-2.5 fw-semibold shadow-sm" style="font-size: 0.9rem;">
                        Submit Review
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const stars = document.querySelectorAll('.star-btn');
        const ratingInput = document.getElementById('ratingInput');
        const ratingDesc = document.getElementById('ratingDescription');

        const descriptions = {
            1: 'Terrible',
            2: 'Poor',
            3: 'Average',
            4: 'Very Good',
            5: 'Excellent!'
        };

        stars.forEach(star => {
            star.addEventListener('click', function () {
                const val = parseInt(this.getAttribute('data-star-value'));
                ratingInput.value = val;
                ratingDesc.textContent = descriptions[val];
                updateStars(val);
            });

            star.addEventListener('mouseenter', function () {
                const val = parseInt(this.getAttribute('data-star-value'));
                highlightStars(val);
            });
        });

        document.querySelector('.star-rating-container').addEventListener('mouseleave', function () {
            const currentVal = parseInt(ratingInput.value);
            updateStars(currentVal);
        });

        function updateStars(val) {
            stars.forEach(s => {
                const sVal = parseInt(s.getAttribute('data-star-value'));
                if (sVal <= val) {
                    s.classList.remove('bi-star');
                    s.classList.add('bi-star-fill');
                    s.style.color = '#ffc107';
                } else {
                    s.classList.remove('bi-star-fill');
                    s.classList.add('bi-star');
                    s.style.color = '#cbd5e1';
                }
            });
        }

        function highlightStars(val) {
            stars.forEach(s => {
                const sVal = parseInt(s.getAttribute('data-star-value'));
                if (sVal <= val) {
                    s.classList.remove('bi-star');
                    s.classList.add('bi-star-fill');
                    s.style.color = '#ffb300';
                } else {
                    s.classList.remove('bi-star-fill');
                    s.classList.add('bi-star');
                    s.style.color = '#cbd5e1';
                }
            });
        }
    });
</script>
@endsection

@endsection
