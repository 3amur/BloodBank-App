@extends('dashboard.home')
@section('title')
    All Donation Requests
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="mb-1">
                <!-- Search Form -->
                <form action="{{ route('dashboard.searchDonationRequest') }}" method="GET">
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
            @if (count($records))
                <div class="mb-2">
                    <h4 class="text-center">@include('flash::message')</h4>
                </div>
                <div class="table-responsive">
                    <!-- Donation Requests -->
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Type</th>
                                <th>Bags</th>
                                <th>Hospital Name</th>
                                <th>Phone</th>
                                <th>Details</th>
                                <th>city</th>
                                <th>Show</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($records as $record)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $record->patient_name }}</td>
                                    <td>{{ $record->patient_age }}</td>
                                    <td>{{ $record->blood_type_id }}</td>
                                    <td>{{ $record->bags_number }}</td>
                                    <td>{{ $record->hospital_name }}</td>
                                    <td>{{ $record->patient_phone }}</td>
                                    <td>{{ $record->details }}</td>
                                    <td>{{ $record->city_id }}</td>
                                    <td><a href="{{ route('dashboard.showDonationRequest', $record->id) }}"
                                            class="btn btn-success"><i class="fa fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <form action="{{ route('dashboard.deleteDonationRequest', $record->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this donation request !')" >
        
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
