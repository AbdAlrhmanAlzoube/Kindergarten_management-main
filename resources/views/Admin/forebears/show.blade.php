@extends('Admin.admin_dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #337ab7; color: white; font-size: 1.25rem;">Forebear Details</div>
                <div class="card-body">
                    <p><strong>ID:</strong> {{ $forebear->id }}</p>
                    <p><strong>User ID:</strong> {{ $forebear->user_id }}</p>
                    <p><strong>Age:</strong> {{ $forebear->age }}</p>

                    <h4 class="mt-4">User Details</h4>
                    <p><strong>First Name:</strong> {{ $forebear->user->first_name }}</p>
                    <p><strong>Last Name:</strong> {{ $forebear->user->last_name }}</p>
                    <p><strong>Address:</strong> {{ $forebear->user->address }}</p>
                    <p><strong>Phone:</strong> {{ $forebear->user->phone }}</p>
                    <p><strong>Email:</strong> {{ $forebear->user->email }}</p>
                    <p><strong>Gender:</strong> {{ $forebear->user->gender }}</p>
                    @if($forebear->user->image)
                        <p><strong>Image:</strong></p>
                        <img src="{{ asset('storage/' . $forebear->user->image) }}" alt="User Image" width="100">
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
