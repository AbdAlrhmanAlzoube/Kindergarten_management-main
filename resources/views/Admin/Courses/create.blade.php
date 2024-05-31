@extends('Admin.admin_dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New Course</div>

                    <div class="card-body">
                        <form action="{{ route('courses.store') }}" method="POST">
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
                            <div class="form-group">
                                <label for="teacher_id">Teacher:</label>
                                <select id="teacher_id" name="teacher_id" class="form-control" required>
                                    @foreach($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->user->first_name . ' ' . $teacher->user->last_name }}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="type">Type:</label>
                                <select id="type" name="type" class="form-control" required>
                                    <option value="english">English</option>
                                    <option value="game">Game</option>
                                    <option value="mental_calculation">Mental Calculation</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea id="description" name="description" rows="4" cols="50" class="form-control" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Create Course</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
