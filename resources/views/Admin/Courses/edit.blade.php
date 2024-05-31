@extends('Admin.admin_dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Course</div>

                    <div class="card-body">
                        <form action="{{ route('courses.update', $course) }}" method="POST">
                            @csrf
                            @method('PUT')
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Teacher ID -->
                            <div class="form-group">
                                <label for="teacher_id">Teacher:</label>
                                <select id="teacher_id" name="teacher_id" class="form-control" >
                                    @foreach($teachers as $teacher)
                                    <option value="{{ $teacher->id }}" {{ $teacher->id == $course->teacher_id ? 'selected' : '' }}>
                                        {{ $teacher->user->first_name . ' ' . $teacher->user->last_name }}
                                    </option>
                                    @endforeach
                                    
                                </select>
                            </div>

                            <!-- Name -->
                          

                            <!-- Type -->
                            <div class="form-group">
                                <label for="type">Type:</label>
                                <select id="type" name="type" class="form-control" required>
                                    <option value="english" {{ $course->type == 'english' ? 'selected' : '' }}>English</option>
                                    <option value="game" {{ $course->type == 'game' ? 'selected' : '' }}>Game</option>
                                    <option value="mental_calculation" {{ $course->type == 'mental_calculation' ? 'selected' : '' }}>Mental Calculation</option>
                                </select>
                            </div>

                            <!-- Description -->
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea id="description" name="description" rows="4" cols="50" class="form-control" required>{{ $course->description }}</textarea>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Update Course</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
