@extends('dashboard.home')
@section('title')
    Edit Government
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <!--Add Government -->
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Edit Government</h3>
                </div>
                <div class="text-center">
                  @if (session()->has('success'))
                    <h3 class="text-success">{{ session()->get('success') }}</h3>
                  @endif
                </div>
                <form action="{{ route('dashboard.updategovernment',$government->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                  <div class="card-body">
                    <div class="form-label">
                      <label>Edit Government</label>
                      <div class="">
                          <input type="text" name="name" value="{{ $government->name }}" class="form-control">
                      </div>
                      @error('name')
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
@endsection
