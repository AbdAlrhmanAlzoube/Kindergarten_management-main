@extends('Admin.admin_dashboard')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    @if (session('message'))
      <div class="alert alert-success">
          {{ session('message') }}
      </div>
    @endif
    @if (session('delete'))
      <div class="alert alert-danger">
          {{ session('delete') }}
      </div>
    @endif
    <div class="card-body">
      <h4 class="card-title">Users Table</h4>
      <div class="table-responsive pt-3">

        <form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between mb-4">
          <x-form-input name="first_name" placeholder="first_name" class="mx-2" :value="request('first_name')" />
          <select name="type" class="form-control mx-2">
            <option value="">All</option>
            <option value="admin" @selected(request('type')==='Admin')>Admin</option>
            <option value="teacher"@selected(request('type')==='Teacher')>Teacher</option>
            <option value="child"@selected(request('type')==='Child')>Child</option>
            <option value="forebear"@selected(request('type')==='Forebear')>Forebear</option>
          </select><br>
          <button class="btn btn-dark mx-2">Filter</button>
        </form>

        <!-- Scrollable table container -->
        <div style="max-height: 400px; overflow-y: auto;">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Type</th>
                <th>Gender</th>
                <th>Image</th>
                <th colspan="3" class="text-center">Options</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($users as $user)
                <tr>
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->first_name }}</td>
                  <td>{{ $user->last_name }}</td>
                  <td>{{ $user->address }}</td>
                  <td>{{ $user->phone }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->type }}</td>
                  <td>{{ $user->gender }}</td>
                  <td><img src="{{ asset('storage/'.$user->image) }}" alt="" width="30px" height="30px"></td>
                  <td>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                      @csrf
                      @method('delete')
                      <input type="submit" class="btn btn-danger btn-rounded btn-fw" value="Delete">
                    </form>
                  </td>
                  <td>
                    <form action="{{ route('users.show', $user->id) }}" method="GET">
                      @csrf
                      <input type="submit" class="btn btn-success btn-rounded btn-fw" value="Show">
                    </form>
                  </td>
                  <td>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-rounded btn-fw">Edit</a>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="11">No Users found</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
        <!-- End of scrollable table container -->

      </div>
    </div>
  </div>
</div>
{{ $users->withQueryString()->links() }}
@endsection
