@extends('Dashboard.Teacher.dashboard')

@section('teacher_content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Edit Review</h1><br>
            <form method="POST" action="{{ route('teacher_review.update', ['teacher_review' => $review->id]) }}">
                @csrf
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @method('PUT')
             
                <div class="form-group">
                    <label for="child_id">Child:</label>
                    <select class="form-control" id="child_id" name="child_id">
                        <option value="">Select Child</option>
                        @foreach($children as $child)
                            <option value="{{ $child->id }}" {{ $child->id == $review->child_id ? 'selected' : '' }}>{{ $child->user->first_name }}</option>
                        @endforeach
                    </select>
                    @error('child_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="teacher_id">Teacher:</label>
                    <select class="form-control" id="teacher_id" name="teacher_id">
                        <option value="">Select Teacher</option>
                        @foreach($teachers as $teacher)
                            <option value="{{ $teacher->id }}" {{ $teacher->id == $review->teacher_id ? 'selected' : '' }}>{{ $teacher->user->first_name }}</option>
                        @endforeach
                    </select>
                    @error('teacher_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="course_id">Course:</label>
                    <select class="form-control" id="course_id" name="course_id">
                        <option value="">Select Course</option>
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->type }}</option>
                        @endforeach
                    </select>
                    @error('course_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>  
                <div class="form-group">
                    <label for="level">Level:</label>
                    <input type="text" class="form-control" id="level" name="level" value="{{ $review->level }}">
                    @error('level')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
