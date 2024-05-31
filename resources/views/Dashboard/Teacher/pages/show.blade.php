@extends('Dashboard.Teacher.dashboard')

@section('teacher_content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Review Details</h1>
            <ul class="list-group list-group-flush">
                <!-- Check if $review is valid and access its properties -->
                <li class="list-group-item"><strong>ID:</strong> {{ $review->id ?? 'Unknown' }}</li>
                <li class="list-group-item"><strong>Child:</strong> {{ $review->child->user->first_name ?? 'Unknown' }}</li>
                <li class="list-group-item"><strong>Teacher:</strong> {{ $review->teacher->user->first_name ?? 'Unknown' }}</li>
                <li class="list-group-item"><strong>Course:</strong> {{ $review->course->name ?? 'Unknown' }}</li>
                <li class="list-group-item"><strong>Level:</strong> {{ $review->level ?? 'Unknown' }}</li>
            </ul>
        </div>
    </div>
</div>
@endsection
