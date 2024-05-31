@extends('Admin.admin_dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Child Details</div>

                <div class="card-body text-center">
                    <!-- Display Child's Image -->
                    <div class="mb-4">
                        @if($child->user->image)
                            <img src="{{ asset('storage/' . $child->user->image) }}" alt="Child Image" style="max-width: 200px;">
                        @else
                            <img src="{{ asset('images/default.png') }}" alt="Default Image" style="max-width: 200px;">
                        @endif
                    </div>
                    
                    <!-- Display Child's Information -->
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">First Name</th>
                                <td>{{ $child->user->first_name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Last Name</th>
                                <td>{{ $child->user->last_name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Age</th>
                                <td>{{ $child->age }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Education Stage</th>
                                <td>{{ $child->education_stage }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Address</th>
                                <td>{{ $child->user->address }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Phone</th>
                                <td>{{ $child->user->phone }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td>{{ $child->user->email }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Gender</th>
                                <td>{{ $child->user->gender }}</td>
                            </tr>
                            <!-- Add more rows to display additional child information -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
