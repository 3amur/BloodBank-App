@extends('dashboard.home')
@section('title')
    View Donation Request
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 mx-auto">
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
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>{{ $record->id }}</td>
                                    <td>{{ $record->patient_name }}</td>
                                    <td>{{ $record->patient_age }}</td>
                                    <td>{{ $record->bloodType->name}}</td>
                                    <td>{{ $record->bags_number }}</td>
                                    <td>{{ $record->hospital_name }}</td>
                                    <td>{{ $record->patient_phone }}</td>
                                    <td>{{ $record->details }}</td>
                                    <td>{{ $record->city->name}}</td>
                                    <td>
                                        <form action="{{ route('dashboard.deleteDonationRequest', $record->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this donation request !')" >
        
                                            @csrf
                                            @method('DELETE')
                                            <button type="text" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
        </div>
    </div>

@endsection
