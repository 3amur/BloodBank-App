@extends('dashboard.home')
@section('title')
    Add City
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <!--Add Government -->
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Add City</h3>
                </div>
                <div class="text-center">
                  @if (session()->has('success'))
                    <h3 class="text-success">{{ session()->get('success') }}</h3>
                  @endif
                </div>
                <form action="{{ route('dashboard.addcity') }}" method="POST">
                    @csrf
                  <div class="card-body">
                    <div class="form-label">
                      <label>Add City</label>
                      <div>
                          <input type="text" name="name" placeholder="Enter City Name" class="form-control">
                      </div>
                      @error('name')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="form-label">
                      <label>Choose Government</label>
                      <div>
                        <select name="government_id" class="form-control">
                          @foreach ($governments as $government)                            
                          <option value="{{ $government->id }}">{{ $government->name }}</option>
                          @endforeach
                        </select>
                      </div>
                      @error('government_id')
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
