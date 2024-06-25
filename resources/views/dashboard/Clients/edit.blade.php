@extends('dashboard.home')
@section('title')
    Edit Category
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <!--Add Category -->
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Edit Category</h3>
                </div>
                <form action="{{ route('dashboard.categories.update', $record->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                  <div class="card-body">
                    <div class="form-label">
                      <label>Edit Category</label>
                      <div>
                          <input type="text" name="name" value="{{ $record->name }}" placeholder="Enter Category Name" class="form-control">
                      </div>
                      @error('name')
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
@endsection
