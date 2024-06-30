@extends('dashboard.home')
@section('title')
    All Settings
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 mx-auto">
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
                                <th>Notification Settings Text</th>
                                <th>About App</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Facebook</th>
                                <th>Twitter</th>
                                <th>Instagram</th>
                                <th>Youtube</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($records as $record)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ Str::limit($record->notification_settings_text, 65) }}</td>
                                    <td>{{ Str::limit($record->about_app, 50) }}</td>
                                    <td>{{ $record->phone }}</td>
                                    <td>{{ $record->email }}</td>
                                    <td>{{ $record->fb_link }}</td>
                                    <td>{{ $record->tw_link }}</td>
                                    <td>{{ $record->insta_link }}</td>
                                    <td>{{ $record->you_link }}</td>
                                    <td><a href="{{ route('dashboard.showSettings', $record->id) }}"
                                            class="btn btn-success"><i class="fa fa-edit"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <h1 class="text-center">No Data Found</h1>
            @endif
        </div>
    </div>

@endsection
