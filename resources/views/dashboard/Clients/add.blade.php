@extends('dashboard.home')
@section('title')
    Add Client
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <!--Add Client -->
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Add Client</h3>
                </div>
                <div class="text-center">
                  @if (session()->has('success'))
                    <h3 class="text-success">{{ session()->get('success') }}</h3>
                  @endif
                </div>
                <form action="{{ route('dashboard.categories.store') }}" method="POST">
                    @csrf
                  <div class="card-body">
                    <div class="form-label">
                      <label>Add Category</label>
                      <div>
                          <input type="text" name="name" placeholder="Enter City Name" class="form-control">
                      </div>
                      @error('name')
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
