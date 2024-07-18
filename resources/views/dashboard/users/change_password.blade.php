@extends('dashboard.home')
@section('title')
    Change Password
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <!-- Change Password -->
            <div class="text-center mt-2">
                <h4 class="text-center">@include('flash::message')</h4>
            </div>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Change Password</h3>
                </div>
                <form action="{{ route('dashboard.updatePassword') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-label">
                            <label>Old Password</label>
                            <div>
                                <input type="text" name="old_password" placeholder="Enter Old Password" class="form-control">
                            </div>
                            @error('old_password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-label">
                            <label>Password</label>
                            <div>
                                <input type="password" name="new_password" placeholder="Enter Your New Password" class="form-control">
                            </div>
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-label">
                            <label>Confirm Password</label>
                            <div>
                                <input type="password" name="password_confirmation" placeholder="Enter Your Confirm New Password" class="form-control">
                            </div>
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
