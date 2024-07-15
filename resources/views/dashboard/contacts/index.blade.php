@extends('dashboard.home')
@section('title')
    All Contacts
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="mb-1">
                <!-- Search Form -->
                <form action="{{ route('dashboard.searchContacts') }}" method="GET">
                    <div class="form-inline">
                        <div class="input-group">
                        <input class="form-control form-control-sidebar" name="search" type="search" placeholder="Search About Contact">
                        <div class="ml-2">
                            <button class="btn btn-success" type="submit">Search</button>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
            @if (count($records))
                <div class="mb-2">
                    <h4 class="text-center">@include('flash::message')</h4>
                </div>
                <div class="table-responsive">
                    <!-- Settings -->
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Message</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($records as $record)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $record->message }}</td>
                                    <td>{{ $record->name }}</td>
                                    <td>{{ $record->email }}</td>
                                    <td>{{ $record->phone }}</td>
                                    <td>
                                        <form action="{{ route('dashboard.deleteContact', $record->id) }}" method="POST"
                                            onsubmit="return confirm('Are You Sure You Want To Delete Message !')" >

                                            @csrf
                                            @method('DELETE')
                                            <button type="text" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $records->links() }}
                </div>
            @else
                <h1 class="text-center">No Data Found</h1>
            @endif
        </div>
    </div>

@endsection
