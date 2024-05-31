@extends('Admin.admin_dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Forebear</div>

                <div class="card-body">
                    <form action="{{ route('forebears.update', $forebear->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" class="form-control" value="{{ $forebear->user->first_name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="{{ $forebear->user->last_name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" value="{{ $forebear->user->address }}" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ $forebear->user->phone }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $forebear->user->email }}" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password (leave blank if not changing)</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control">
                            @if($forebear->user->image)
                            <img src="{{ asset('storage/' . $forebear->user->image) }}" alt="User Image" width="100">
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <input type="text" name="gender" class="form-control" value="{{ $forebear->user->gender }}">
                        </div>

                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="number" name="age" class="form-control" value="{{ $forebear->age }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
