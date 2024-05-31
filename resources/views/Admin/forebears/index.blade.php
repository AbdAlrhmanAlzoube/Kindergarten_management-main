@extends('Admin.admin_dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Forebears Table</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <div style="max-height: 400px; overflow-y: auto;">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User ID</th>
                                        <th>Age</th>
                                        <th colspan="3" class="text-center">Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($forebears as $forebear)
                                    <tr>
                                        <td>{{ $forebear->id }}</td>
                                        <td>{{ $forebear->user_id }}</td>
                                        <td>{{ $forebear->age }}</td>
                                        <td>
                                            <form action="{{ route('forebears.show', $forebear->id) }}" method="GET">
                                                @csrf
                                                <input type="submit" class="btn btn-success btn-rounded btn-fw" value="Show">
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{ route('forebears.edit', $forebear->id) }}" class="btn btn-warning btn-rounded btn-fw">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('forebears.destroy', $forebear->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-rounded btn-fw" onclick="return confirm('Are you sure you want to delete this forebear?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Render pagination links -->
                </div>
            </div>
        </div>
    </div>
</div>
{{ $forebears->links() }}
@endsection
