@extends('Dashboard.Teacher.dashboard')

@section('teacher_content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">All Reviews</h1>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

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
            <div class="table-responsive pt-3">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Child</th>
                            <th>Teacher</th>
                            <th>Course</th>
                            <th>Level</th>
                            <th>Action</th> <!-- New Column for Actions -->
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($reviews as $review)
                            <tr>
                                <td>{{ $review->id }}</td>
                                <td>{{ $review->child->user->first_name }}</td>
                                <td>{{ $review->teacher->user->first_name }}</td>
                                <td>{{ $review->course->type }}</td>
                                <td>{{ $review->level }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Review Actions">
                                        <a href="{{ route('teacher_review.show', $review) }}"
                                            class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('teacher_review.edit', $review) }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('teacher_review.destroy', $review) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this review?')">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No reviews found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{ $reviews->links() }}
@endsection
