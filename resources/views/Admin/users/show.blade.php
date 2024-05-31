@extends('admin.admin_dashboard') <!-- Make sure to extend your main layout -->

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1>User Details</h1>
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>First Name</th>
                            <td>{{ $user->first_name }}</td>
                        </tr>
                        <tr>
                            <th>Last Name</th>
                            <td>{{ $user->last_name }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $user->address }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{ $user->phone }}</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>{{ $user->gender }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Type</th>
                            <td>{{ $user->type }}</td>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <td>
                                @if ($user->image)
                                    <img src="{{ asset('storage/' . $user->image) }}" alt="User Image" width="150">
                                @else
                                    No image available
                                @endif
                            </td>
                        </tr>
                    </table>
                    
                </div>
            </div>
        </div>
 </div>
</div>
@endsection
