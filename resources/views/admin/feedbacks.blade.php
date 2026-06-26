@extends('admin.adminLayout')

@section('content')
@if(session('success'))
    <div class="alert alert-success rounded-3 py-2 px-3 mb-3 d-flex align-items-center gap-2" style="font-size: 0.85rem;">
        <i class="bi bi-check-circle-fill text-success"></i> {{ session('success') }}
    </div>
@endif

@php
    $totalFeedbacks = $feedbacks->count();
    $averageRating = $totalFeedbacks > 0 ? round($feedbacks->avg('rating'), 1) : 0;

    $fiveStar = $feedbacks->where('rating', 5)->count();
    $fourStar = $feedbacks->where('rating', 4)->count();
    $threeStar = $feedbacks->where('rating', 3)->count();
    $twoStar = $feedbacks->where('rating', 2)->count();
    $oneStar = $feedbacks->where('rating', 1)->count();

    $satisfactionRate = 0;
    if ($totalFeedbacks > 0) {
        $satisfactionRate = round((($fiveStar + $fourStar) / $totalFeedbacks) * 100);
    }
@endphp

<div class="row g-4 mb-4">
    <div class="col-lg-4">
        <div class="card border-0 bg-white rounded-4 p-4 shadow-sm h-100">
            <h6 class="text-secondary fw-semibold mb-3" style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Overall Rating</h6>
            <div class="d-flex align-items-baseline gap-2 mb-2">
                <span class="display-4 fw-bold text-dark" style="letter-spacing: -1px;">{{ $averageRating }}</span>
                <span class="text-secondary" style="font-size: 1rem;">/ 5</span>
            </div>
            
            <div class="d-flex gap-1 text-warning mb-3" style="font-size: 1.2rem;">
                @for($i = 1; $i <= 5; $i++)
                    @if($i <= round($averageRating))
                        <i class="bi bi-star-fill"></i>
                    @else
                        <i class="bi bi-star"></i>
                    @endif
                @endfor
            </div>
            
            <p class="text-secondary mb-0" style="font-size: 0.85rem;">Based on <span class="fw-semibold text-dark">{{ $totalFeedbacks }}</span> patient reviews</p>
            
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card border-0 bg-white rounded-4 p-4 shadow-sm h-100">
            <h6 class="text-secondary fw-semibold mb-4" style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Rating Breakdown</h6>
            
            <div class="d-flex flex-column gap-3">
                @foreach([5 => $fiveStar, 4 => $fourStar, 3 => $threeStar, 2 => $twoStar, 1 => $oneStar] as $stars => $count)
                    @php
                        $pct = $totalFeedbacks > 0 ? round(($count / $totalFeedbacks) * 100) : 0;
                    @endphp
                    <div class="d-flex align-items-center gap-3">
                        <span class="fw-semibold text-secondary" style="font-size: 0.85rem; width: 50px;">{{ $stars }} Star</span>
                        <div class="progress flex-grow-1 rounded-pill" style="height: 10px; background-color: #f1f5f9;">
                            <div class="progress-bar rounded-pill bg-warning" role="progressbar" style="width: {{ $pct }}%" aria-valuenow="{{ $pct }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="text-secondary text-end" style="font-size: 0.82rem; width: 40px;">{{ $count }}</span>
                        <span class="fw-semibold text-dark text-end" style="font-size: 0.82rem; width: 45px;">{{ $pct }}%</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="card border-0 bg-white rounded-4 p-4 shadow-sm">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        <div>
            <h5 class="fw-bold mb-1 text-dark" style="letter-spacing: -0.5px;">Patient Feedback</h5>
            <p class="text-secondary mb-0" style="font-size: 0.85rem;">Read patient reviews and general platform feedback</p>
        </div>
        
        <div class="d-flex bg-light p-1 rounded-3 gap-1">
            <button onclick="filterFeedbacks('all')" id="tab-all" class="btn btn-sm rounded-2 px-3 py-1.5 fw-semibold filter-tab active-tab" style="font-size: 0.8rem;">All</button>
            <button onclick="filterFeedbacks('positive')" id="tab-positive" class="btn btn-sm rounded-2 px-3 py-1.5 fw-semibold filter-tab" style="font-size: 0.8rem;">4-5 Stars</button>
            <button onclick="filterFeedbacks('critical')" id="tab-critical" class="btn btn-sm rounded-2 px-3 py-1.5 fw-semibold filter-tab" style="font-size: 0.8rem;">1-3 Stars</button>
        </div>
    </div>

    <div class="d-flex flex-column gap-3">
        @forelse($feedbacks as $fb)
            @php
                $patientName = $fb->patient_name ?? 'Anonymous Patient';
                $patientInitial = strtoupper(substr(preg_replace('/^(mr\.|ms\.|dr\.)\s+/i', '', $patientName), 0, 1)) ?: 'P';
                
                $colors = ['#0f5cfd', '#be185d', '#0ca678', '#d97706', '#6366f1'];
                $avatarBg = $colors[(crc32($patientName) & 0x7fffffff) % count($colors)];
                $timeDiff = \Carbon\Carbon::parse($fb->created_at)->diffForHumans();
                
                $filterClass = ($fb->rating >= 4) ? 'positive' : 'critical';
            @endphp
            
            <div class="feedback-card border rounded-4 p-4 transition-all" data-rating-type="{{ $filterClass }}" style="border-color: #f1f5f9 !important;">
                <div class="d-flex flex-wrap justify-content-between align-items-start gap-3">
                    <div class="d-flex gap-3">
                        <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold text-white shadow-sm" 
                             style="width: 42px; height: 42px; font-size: 0.95rem; background-color: {{ $avatarBg }}; flex-shrink: 0;">
                            {{ $patientInitial }}
                        </div>
                        <div>
                            <div class="d-flex align-items-center gap-2 flex-wrap">
                                <h6 class="fw-bold mb-0 text-dark" style="font-size: 0.9rem;">{{ $patientName }}</h6>
                                <span class="badge bg-primary-subtle text-primary px-2.5 py-0.5 rounded-pill" style="font-size: 0.7rem;">Verified Patient</span>
                            </div>
                            
                            <!-- Star Rating Row -->
                            <div class="d-flex gap-0.5 text-warning mt-1.5" style="font-size: 0.85rem;">
                                @for($j = 1; $j <= 5; $j++)
                                    @if($j <= $fb->rating)
                                        <i class="bi bi-star-fill"></i>
                                    @else
                                        <i class="bi bi-star"></i>
                                    @endif
                                @endfor
                                <span class="text-secondary fw-semibold ms-1.5" style="font-size: 0.8rem;">({{ $fb->rating }}/5)</span>
                            </div>
                        </div>
                    </div>
                    
                    <span class="text-secondary" style="font-size: 0.8rem; font-weight: 500;">
                        <i class="bi bi-clock me-1"></i> {{ $timeDiff }}
                    </span>
                </div>

                <div class="mt-3 ps-md-5">
                    <p class="text-dark mb-0 lh-base" style="font-size: 0.88rem; white-space: pre-wrap;">{{ $fb->comments }}</p>
                </div>
            </div>
        @empty
            <div class="text-center py-5 border rounded-4" style="border-color: #f1f5f9 !important; border-style: dashed !important;">
                <div class="bg-light rounded-circle p-3 d-inline-flex mb-3">
                    <i class="bi bi-chat-left-text text-secondary fs-3"></i>
                </div>
                <h6 class="fw-bold text-dark mb-1">No feedback received yet</h6>
                <p class="text-secondary small mb-0">Patient reviews and feedback will display here</p>
            </div>
        @endforelse
    </div>
</div>

<style>
    .transition-all {
        transition: all 0.25s ease-in-out;
    }
    .feedback-card:hover {
        background-color: #fafbfc;
        border-color: #e2e8f0 !important;
        transform: translateY(-1px);
    }
    .filter-tab {
        background-color: transparent;
        color: #64748b;
        border: none;
    }
    .filter-tab:hover {
        color: #0f5cfd;
    }
    .active-tab {
        background-color: #ffffff !important;
        color: #0f5cfd !important;
        box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    }
</style>

<script>
    function filterFeedbacks(type) {
        document.querySelectorAll('.filter-tab').forEach(btn => {
            btn.classList.remove('active-tab');
        });
        
        document.getElementById('tab-' + type).classList.add('active-tab');
        
        document.querySelectorAll('.feedback-card').forEach(card => {
            if (type === 'all') {
                card.style.display = 'block';
            } else {
                if (card.getAttribute('data-rating-type') === type) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            }
        });
    }
</script>
@endsection
