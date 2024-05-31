@extends('Admin.admin_dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Advertisements</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div style="max-height: 400px; overflow-y: auto; overflow-x: auto;">
            <form> <select name="type" class="form-control mx-2">
                <option value="">All</option>
                <option value="Active" @selected(request('status')==='Active')>Active</option>
                <option value="Inactive"@selected(request('status')==='Inactive')>Inactive</option>
              </select><br>
              <button class="btn btn-dark mx-2">Filter</button></form>
           
          
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Status</th>
                                        <th colspan="3" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($advertisements as $advertisement)
                                        <tr>
                                            <td>{{ $advertisement->title }}</td>
                                            <td>{{ $advertisement->description }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $advertisement->image) }}" alt="Advertisement Image" style="max-width: 100px;">
                                            </td>
                                            <td>{{ $advertisement->start_date }}</td>
                                            <td>{{ $advertisement->end_date }}</td>
                                            <td>{{ $advertisement->status ? 'Active' : 'Inactive' }}</td>
                                            <td>
                                                <form action="{{ route('advertisements.destroy', $advertisement->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" class="btn btn-danger btn-rounded btn-fw" value="Delete" onclick="return confirm('Are you sure you want to delete this advertisement?')">
                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{ route('advertisements.show', $advertisement->id) }}" method="GET">
                                                    @csrf
                                                    <input type="submit" class="btn btn-success btn-rounded btn-fw" value="Show">
                                                </form>
                                            </td>
                                            <td>
                                                <a href="{{ route('advertisements.edit', $advertisement->id) }}" class="btn btn-warning btn-rounded btn-fw">Edit</a>
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
    </div>
    {{ $advertisements->links() }}
@endsection
