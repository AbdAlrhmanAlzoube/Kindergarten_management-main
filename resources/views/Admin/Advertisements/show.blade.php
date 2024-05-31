@extends('Admin.admin_dashboard')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Advertisement Details</div>

            <div class="card-body">
                <p><strong>Title:</strong> {{ $advertisement->title }}</p>
                <p><strong>Description:</strong> {{ $advertisement->description }}</p>
                <p><strong>Image:</strong> <img src="{{ asset('storage/' . $advertisement->image) }}" alt="Advertisement Image" style="max-width: 200px;"></p>
                <p><strong>Start Date:</strong> {{ $advertisement->start_date }}</p>
                <p><strong>End Date:</strong> {{ $advertisement->end_date }}</p>
                <p><strong>Status:</strong> {{ $advertisement->status ? 'Active' : 'Inactive' }}</p>
            </div>
        </div>
    </div>
@endsection
