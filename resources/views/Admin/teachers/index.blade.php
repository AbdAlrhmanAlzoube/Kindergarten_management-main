@extends('Admin.admin_dashboard')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Teachers List</div>

            <div class="card-body">

                
        <form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between mb-4">
            <x-form-input name="first_name" placeholder="first_name" class="mx-2" :value="request('first_name')" />
            <select name="gender" class="form-control mx-2">
              <option value="">All</option>
              <option value="male" @selected(request('gender')==='male')>male</option>
              <option value="female"@selected(request('gender')==='female')>female</option>
            </select><br>
            <button class="btn btn-dark mx-2">Filter</button>
          </form>

                <div style="max-height: 400px; overflow-y: auto;">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Gender</th> <!-- إضافة عمود الجنس -->
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teachers as $teacher)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $teacher->user->first_name }}</td>
                                    <td>{{ $teacher->user->last_name }}</td>
                                    <td>{{ $teacher->user->email }}</td>
                                    <td>{{ $teacher->user->gender }}</td> <!-- عرض الجنس -->
                                    <td>
                                        <a href="{{ route('teachers.show', $teacher->id) }}" class="btn btn-success btn-rounded btn-fw btn-sm">View</a>
                                        <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-warning btn-rounded btn-fw btn-sm">Edit</a>
                                        <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-rounded btn-fw btn-sm" onclick="return confirm('Are you sure you want to delete this teacher?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{ $teachers->links() }}
@endsection
