@extends('dashboard.home')
@section('title')
    Edit Role
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <!--Edit Role -->
            <div class="card card-primary">
                <div class="mb-1">
                    <h4 class="text-center text-success">@include('flash::message')</h4>
                </div>
                <div class="card-header">
                    <h3 class="card-title">Edit Role</h3>
                </div>
                <form action="{{ route('dashboard.role.update', $record->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-label">
                            <label>Edit Role</label>
                            <div>
                                <input type="text" name="name" value="{{ $record->name }}"
                                    placeholder="Enter Category Name" class="form-control">
                            </div>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-label">
                            <label>Permissions</label><br>
                            <input id="select-all" type="checkbox" name="select-all">
                            <label for="select-all">Choose All</label>
                            <br>
                            @foreach ($permissions as $permission)
                                <div class="form-check-inline">
                                    <input class="form-check-input" name="permissions_list[]"
                                        type="checkbox"value="{{ $permission->id }}"
                                        @if ($record->hasPermissionTo($permission->name)) checked @endif>
                                    {{ $permission->name }}
                                </div>
                            @endforeach
                            @error('permissions_list')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Edit</button>
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
