@extends('dashboard.home')
@section('title')
    Edit User
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
                    <h3 class="card-title">Edit User</h3>
                </div>
                <form action="{{ route('dashboard.users.update', $record->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-label">
                            <label>User Name</label>
                            <div>
                                <input type="text" name="name" value="{{ $record->name }}"
                                    placeholder="Enter User Name" class="form-control">
                            </div>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-label">
                            <label>Email</label>
                            <div>
                                <input type="text"name="email" value="{{ $record->email }}"
                                    placeholder="Enter Your Email" class="form-control">
                            </div>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-label">
                            <label>Password</label>
                            <div>
                                <input type="password" name="password" value="{{ $record->password }}"
                                    placeholder="Enter User Password" class="form-control">
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
                                        value="{{ $role }}" {{ in_array($role, $userRoles) ? 'checked' : '' }}>
                                    {{ $role }}
                                </div>
                            @endforeach
                            @error('roles_list')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
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
