@extends('dashboard.home')
@section('title')
    All Cities
@endsection
{{-- @section('small_title')
    /Statistics
@endsection --}}

@section('content')
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <!--Governments -->
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Government Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cities as $city)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $city->name }}</td>
                            <td>{{ $city->government ? $city->government->name : 'No Government Assigned' }}</td>
                            <td><a href="{{ route('dashboard.editcity', $city->id) }}" class="btn btn-primary">Edit</a></td>
                            <td>
                                <form action="{{ route('dashboard.deletecity', $city->id) }}" method="POST"
                                    onsubmit="return confirm('Are You Sure You Want To Delete Government !')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="text" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Render pagination links -->
            {{ $cities->links() }}
        </div>
    </div>
@endsection
