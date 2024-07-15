@extends('dashboard.home')
@section('title')
    All Roles
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="mb-1">
                <a href="{{ route('dashboard.role.create') }}">
                    <button class="btn btn-primary">New Role</button>
                </a>
            </div>
            @if(count($records))
            <div class="mb-2">
                <h4 class="text-center">@include('flash::message')</h4>
            </div>
            <div class="table-responsive">
                
                <!-- Roles -->
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
                        @foreach ($records as $record)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $record->name }}</td>
                            <td><a href="{{ route('dashboard.role.edit', $record->id) }}" class="btn btn-primary btn-l"><i class="fa fa-edit"></i></a></td>
                            <td>
                                <form action="{{ route('dashboard.role.destroy', $record->id) }}" method="POST"
                                    onsubmit="return confirm('Are You Sure You Want To Delete Role !')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="text" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <h1 class="text-center">No Data Found</h1>
            @endif
            <!-- Render pagination links -->
                {{ $records->links() }}
            </div>
        </div>
        @endsection
