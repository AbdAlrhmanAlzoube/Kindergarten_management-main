@extends('Dashboard.Forebear.dashboard')

@section('forebear_content')
<div class="container">
    <h1>Edit Child</h1>
    
    <form action="{{ route('forebear_child.update', ['forebear_child' => $child->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <!-- User Selection -->
        <div class="form-group">
            <label for="user_id">User</label>
            <select name="user_id" id="user_id" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" @if($user->id == $child->user_id) selected @endif>{{ $user->first_name }} {{ $user->last_name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Forebear Selection -->
        <div class="form-group">
            <label for="forebear_id">Forebear</label>
            <select name="forebear_id" id="forebear_id" class="form-control" required>
                @foreach($forebears as $forebear)
                    <option value="{{ $forebear->id }}" @if($forebear->id == $child->forebear_id) selected @endif>{{ $forebear->user->first_name }} {{ $forebear->user->last_name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Age -->
        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" name="age" id="age" class="form-control" value="{{ $child->age }}" min="3" max="5" required>
        </div>

        <!-- Education Stage -->
        <div class="form-group">
            <label for="education_stage">Education Stage</label>
            <select name="education_stage" id="education_stage" class="form-control" required>
                <option value="kg1" @if($child->education_stage == 'kg1') selected @endif>KG1</option>
                <option value="kg2" @if($child->education_stage == 'kg2') selected @endif>KG2</option>
                <option value="kg3" @if($child->education_stage == 'kg3') selected @endif>KG3</option>
            </select>
        </div>
        
        <!-- Current Image -->
        @if($child->user->image)
        <div class="form-group">
            <label>Current Image:</label><br>
            <img src="{{ asset('storage/' . $child->user->image) }}" alt="Current Image" class="img-thumbnail" width="150">
        </div>
        @endif

        <!-- Image Upload -->
        <div class="form-group">
            <label for="image">Profile Image (Optional)</label>
            <input type="file" name="image" id="image" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary">Update Child</button>
        <a href="{{ route('forebear_child.index') }}" class="btn btn-secondary">Back to List</a>
    </form>
</div>
@endsection
