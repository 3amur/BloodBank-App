@extends('dashboard.home')
@section('title')
    All Governments
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
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($governments as $government)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $government->name }}</td>
                            <td><a href="{{ route('dashboard.editgovernment', $government->id) }}"
                                    class="btn btn-primary">Edit</a></td>
                            <td>
                                <form action="{{ route('dashboard.deletegovernment', $government->id) }}" method="POST" onsubmit="return confirm('Are You Sure You Want To Delete Government !')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="text" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
