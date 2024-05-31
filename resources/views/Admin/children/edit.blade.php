@extends('Admin.admin_dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Child</div>

                <div class="card-body">
                    <form action="{{ route('children.update', $child->id) }}" method="POST" enctype="multipart/form-data">
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

                        <!-- First Name -->
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ $child->user->first_name }}" placeholder="Enter child's first name">
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Last Name -->
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ $child->user->last_name }}" placeholder="Enter child's last name">
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Address -->
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ $child->user->address }}" placeholder="Enter address">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ $child->user->phone }}" placeholder="Enter phone number">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Image -->
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Gender -->
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender">
                                <option value="male" {{ $child->user->gender == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ $child->user->gender == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $child->user->email }}" placeholder="Enter email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter new password (optional)">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Age -->
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="number" class="form-control @error('age') is-invalid @enderror" id="age" name="age" value="{{ $child->age }}" placeholder="Enter age" min="3" max="5">
                            @error('age')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Education Stage -->
                        <div class="form-group">
                            <label for="education_stage">Education Stage</label>
                            <select class="form-control @error('education_stage') is-invalid @enderror" id="education_stage" name="education_stage">
                                <option value="{{ \App\Enum\EducationStage::KG1 }}" {{ $child->education_stage == \App\Enum\EducationStage::KG1 ? 'selected' : '' }}>KG1</option>
                                <option value="{{ \App\Enum\EducationStage::KG2 }}" {{ $child->education_stage == \App\Enum\EducationStage::KG2 ? 'selected' : '' }}>KG2</option>
                                <option value="{{ \App\Enum\EducationStage::KG3 }}" {{ $child->education_stage == \App\Enum\EducationStage::KG3 ? 'selected' : '' }}>KG3</option>
                            </select>
                            @error('education_stage')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Forebear -->
                        <div class="form-group">
                            <label for="forebear_id">Forebear</label>
                            <select class="form-control @error('forebear_id') is-invalid @enderror" id="forebear_id" name="forebear_id">
                                @foreach($forebears as $forebear)
                                    <option value="{{ $forebear->id }}" {{ $child->forebear_id == $forebear->id ? 'selected' : '' }}>{{ $forebear->user->first_name }} {{ $forebear->user->last_name }}</option>
                                @endforeach
                            </select>
                            @error('forebear_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
