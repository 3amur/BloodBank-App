@extends('dashboard.home')
@section('title')
    All Users
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="mb-1">
                <a href="{{ route('dashboard.users.create') }}">
                    <button class="btn btn-primary">New User</button>
                </a>
            </div>
            @if(count($records))
            <div class="mb-2">
                <h4 class="text-center">@include('flash::message')</h4>
            </div>
            <div class="table-responsive">
                
                <!-- Users -->
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($records as $record)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $record->name }}</td>
                            <td>
                                @foreach ($record->roles as $role)
                                    {{ $role->name }}<br>
                                @endforeach
                            </td>
                            <td><a href="{{ route('dashboard.users.edit', $record->id) }}" class="btn btn-primary btn-l"><i class="fa fa-edit"></i></a></td>
                            <td>
                                <form action="{{ route('dashboard.users.destroy', $record->id) }}" method="POST"
                                    onsubmit="return confirm('Are You Sure You Want To Delete User !')">
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
