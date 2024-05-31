@extends('Admin.admin_dashboard')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">All Reviews</h1>
                <div class="table-responsive pt-3">
                    
        <form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between mb-4">
            <x-form-input name="first_name" placeholder="first_name" class="mx-2" :value="request('first_name')" />
            <select name="level" class="form-control mx-2">
              <option value="">All</option>
              <option value="excellent" @selected(request('level')==='excellent')>Excellent</option>
              <option value="good"@selected(request('level')==='good')>Good</option>
              <option value="weak"@selected(request('level')==='weak')>Weak</option>
            </select><br>
            <button class="btn btn-dark mx-2">Filter</button>
          </form>
                    <div style="max-height: 400px; overflow-y: auto;">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Child</th>
                                    <th>Teacher</th>
                                    <th>Course</th>
                                    <th>Level</th>
                                    <th colspan="3" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reviews as $review)
                                    <tr>
                                        <td>{{ $review->id }}</td>
                                        <td>{{ $review->child->user->first_name }}</td>
                                        <td>{{ $review->teacher->user->first_name }}</td>
                                        <td>{{ $review->course->type }}</td>
                                        <td>{{ $review->level }}</td>
                                        <td>
                                            <form action="{{ route('reviews.show', $review) }}" method="GET">
                                                @csrf
                                                <input type="submit" class="btn btn-success btn-rounded btn-fw" value="Show">
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{ route('reviews.edit', $review) }}" class="btn btn-warning btn-rounded btn-fw">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('reviews.destroy', $review) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-rounded btn-fw" onclick="return confirm('Are you sure you want to delete this review?')">Delete</button>
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
    </div>
   {{ $reviews->links() }}
@endsection
