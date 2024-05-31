@extends('Admin.admin_dashboard')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">Review Details</h1>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>ID:</strong> {{ $review->id }}</li>
                    <li class="list-group-item"><strong>Child:</strong> {{ $review->child->user->first_name }}</li>
                    <li class="list-group-item"><strong>Teacher:</strong> {{ $review->teacher->user->first_name }}</li>
                    <li class="list-group-item"><strong>Course:</strong> {{ $review->course->name }}</li>
                    <li class="list-group-item"><strong>Level:</strong> {{ $review->level }}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
