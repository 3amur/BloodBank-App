@extends('dashboard.home')
@section('title')
    Add Users
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <!--Add User -->
            <div class="text-center mt-2">
                <h4 class="text-center">@include('flash::message')</h4>
            </div>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add User</h3>
                </div>
                <form action="{{ route('dashboard.users.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-label">
                            <label>User Name</label>
                            <div>
                                <input type="text" name="name" placeholder="Enter User Name" class="form-control">
                            </div>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-label">
                            <label>Email</label>
                            <div>
                                <input type="email" name="email" placeholder="Enter User Email" class="form-control">
                            </div>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-label">
                            <label>Password</label>
                            <div>
                                <input type="password" name="password" placeholder="Enter User Password"
                                    class="form-control">
                            </div>
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-label">
                            <label>Roles</label>
                            <br>
                            <input id="select-all" type="checkbox">
                            <label for="select-all">Choose All</label>
                            <br>
                            @foreach ($roles as $role)
                                <div class="form-check-inline">
                                    <input class="form-check-input" name="roles_list[]" type="checkbox"
                                        value="{{ $role->name }}">{{ $role->name }}
                                </div>
                            @endforeach
                            @error('roles_list')
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
    @push('scripts')
        <script>
            $("#select-all").click(function() {
                $("input[type=checkbox]").prop("checked", $(this).prop("checked"));
            });
        </script>
    @endpush
@endsection
