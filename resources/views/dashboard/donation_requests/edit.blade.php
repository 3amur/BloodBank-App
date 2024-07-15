@extends('dashboard.home')
@section('title')
    Edit Settings
@endsection
 
@section('content')
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="text-center mt-2">
              <h4 class="text-center">@include('flash::message')</h4>
            </div>
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Edit Settings</h3>
                </div>
                <form action="{{ route('dashboard.updateSettings', $record->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                  <div class="card-body">
                    <div class="form-label">
                      <label>Notification Settings Text</label>
                      <div>
                        <textarea name="notification_settings_text" cols="10" rows="3" class="form-control">{{ $record->notification_settings_text }}</textarea>
                      </div>
                      @error('notification_settings_text')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="form-label">
                      <label>About App</label>
                      <div>
                        <textarea name="about_app" cols="10" rows="3" class="form-control">{{ $record->about_app }}</textarea>
                      </div>
                      @error('about_app')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="form-label">
                      <label>Phone</label>
                      <div>
                          <input type="number" name="phone" value="{{ $record->phone }}" placeholder="Enter Your Number" class="form-control">
                      </div>
                      @error('phone')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="form-label">
                      <label>Email</label>
                      <div>
                          <input type="email" name="email" value="{{ $record->email }}" placeholder="Enter Your Email" class="form-control">
                      </div>
                      @error('email')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="form-label">
                      <label>Facebook Link</label>
                      <div>
                          <input type="text" name="fb_link" value="{{ $record->fb_link }}" placeholder="Enter Your Link" class="form-control">
                      </div>
                      @error('fb_link')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="form-label">
                      <label>Twitter Link</label>
                      <div>
                          <input type="text" name="tw_link" value="{{ $record->tw_link }}" placeholder="Enter Your Link" class="form-control">
                      </div>
                      @error('tw_link')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="form-label">
                      <label>Instagram Link</label>
                      <div>
                          <input type="text" name="insta_link" value="{{ $record->insta_link }}" placeholder="Enter Your Link" class="form-control">
                      </div>
                      @error('insta_link')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="form-label">
                      <label>Youtube Link</label>
                      <div>
                          <input type="text" name="you_link" value="{{ $record->you_link }}" placeholder="Enter Your Link" class="form-control">
                      </div>
                      @error('you_link')
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
