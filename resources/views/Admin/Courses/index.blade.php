@extends('Admin.admin_dashboard')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">All Courses</h4>
      <div class="table-responsive pt-3">
        <div style="max-height: 400px; overflow-y: auto;">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Type</th>
                <th>Description</th>
                <th colspan="3" class="text-center">Options</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($courses as $course)
                <tr>     
                  <td>{{ $course->id }}</td>
                  <td>{{ $course->type }}</td>
                  <td>{{ $course->description }}</td>
                  <td>
                    <form action="{{ route('courses.show', $course->id) }}" method="GET">
                      @csrf
                      <input type="submit" class="btn btn-success btn-rounded btn-fw" value="Show">
                    </form>
                  </td>
                  <td>
                    <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning btn-rounded btn-fw">Edit</a>
                  </td>
                  <td>
                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-rounded btn-fw" onclick="return confirm('Are you sure you want to delete this course?')">Delete</button>
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="6">No Courses found</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
{{ $courses->links() }}
@endsection
