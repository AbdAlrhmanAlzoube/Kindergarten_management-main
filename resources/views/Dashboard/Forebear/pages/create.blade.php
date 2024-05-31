@extends('Dashboard.Forebear.dashboard')

@section('forebear_content')
<div class="container">
    <h1>Create New Child</h1>
    
    <form action="{{ route('forebear_child.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <!-- User Selection -->
        <div class="form-group">
            <label for="user_id">User</label>
            <select name="user_id" id="user_id" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Forebear Selection -->
        <div class="form-group">
            <label for="forebear_id">Forebear</label>
            <select name="forebear_id" id="forebear_id" class="form-control" required>
                @foreach($forebears as $forebear)
                    <option value="{{ $forebear->id }}">{{ $forebear->user->first_name }} {{ $forebear->user->last_name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Age -->
        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" name="age" id="age" class="form-control" min="3" max="5" required>
        </div>

        <!-- Education Stage -->
        <div class="form-group">
            <label for="education_stage">Education Stage</label>
            <select name="education_stage" id="education_stage" class="form-control" required>
                <option value="kg1">KG1</option>
                <option value="kg2">KG2</option>
                <option value="kg3">KG3</option>
            </select>
        </div>
        
        <!-- Image Upload -->
        <div class="form-group">
            <label for="image">Profile Image (Optional)</label>
            <input type="file" name="image" id="image" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary">Create Child</button>
        <a href="{{ route('forebear_child.index') }}" class="btn btn-secondary">Back to List</a>
    </form>
</div>
@endsection
