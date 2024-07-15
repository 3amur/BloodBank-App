@extends('dashboard.home')
@section('title')
    Add Role
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <!--Add Role -->
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Add Role</h3>
                </div>
                <div class="text-center">
                  @if (session()->has('success'))
                    <h3 class="text-success">{{ session()->get('success') }}</h3>
                  @endif
                </div>
                <form action="{{ route('dashboard.role.store') }}" method="POST">
                  @csrf
                  <div class="card-body">
                    <div class="form-label">
                      <label>Add Role</label>
                      <div>
                          <input type="text" name="name" placeholder="Enter Role Name" class="form-control">
                      </div>
                      @error('name')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>  
                  <div class="card-body">
                    <div class="form-label">
                      <label>Permissions</label>
                      <br>
                      @foreach ($permissions as $permission)                        
                      <div class="form-check-inline">
                        <input class="form-check-input" name="permissions_list[]" type="checkbox"value="{{ $permission->id }}">{{ $permission->name}}
                      </div>
                      @endforeach
                      @error('permissions_list')
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
