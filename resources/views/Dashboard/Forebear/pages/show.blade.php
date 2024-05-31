@extends('Dashboard.Forebear.dashboard')

@section('forebear_content')
<div class="container">
    <h1>Child Details</h1>

    <!-- Child Information -->
    <div class="card">
        <div class="card-body">
            <h3>{{ $child->user->first_name }} {{ $child->user->last_name }}</h3>

            @if($child->user->image)
                <img src="{{ asset('storage/' . $child->user->image) }}" alt="Profile Image" class="img-thumbnail" width="150">
            @endif

            <p><strong>Age:</strong> {{ $child->age }}</p>
            <p><strong>Education Stage:</strong> {{ $child->education_stage }}</p>
            <p><strong>Forebear:</strong> {{ $child->forebear->user->first_name }} {{ $child->forebear->user->last_name }}</p>
        </div>
    </div>

    <!-- Back Button -->
    <a href="{{ route('forebear_child.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection
