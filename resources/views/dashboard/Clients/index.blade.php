@extends('dashboard.home')
@section('title')
    All Clients
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="mb-1">
                <!-- Search Form -->
                <form action="{{ route('dashboard.searchclient') }}" method="GET">
                    <div class="form-inline">
                        <div class="input-group">
                        <input class="form-control form-control-sidebar" name="search" type="search" placeholder="Search About Client">
                        <div class="ml-2">
                            <button class="btn btn-success" type="submit">Search</button>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
            @if(count($records))
            <div class="mb-2">
                <h5 class="text-center">@include('flash::message')</h5>
            </div>
            <div class="table-responsive">
                
                <!-- Categories -->
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Birth</th>
                            <th>Blood Type</th>
                            <th>Last Donation</th>
                            <th>City</th>
                            <th>Status</th>
                            <th>Active</th>
                            <th>De Active</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($records as $record)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $record->name }}</td>
                            <td>{{ $record->email }}</td>
                            <td>{{ $record->d_o_b }}</td>
                            <td>{{ $record->bloodType ? $record->bloodType->name : 'No BloodType Assigned' }}</td>
                            <td>{{ $record->last_donation_date }}</td>
                            <td>{{ $record->city ? $record->city->name : 'No City Assigned' }}</td>
                            <td>{{ $record->is_active }}</td>
                            <td><a href="{{ route('dashboard.activeclient', $record->id) }}" class="btn btn-success">Active</a></td>
                            <td><a href="{{ route('dashboard.deactiveclient', $record->id) }}" class="btn btn-danger">DeActive</a></td>
                            <td>
                                <form action="{{ route('dashboard.deleteclient', $record->id) }}" method="POST"
                                    onsubmit="return confirm('Are You Sure You Want To Delete Client !')">
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
