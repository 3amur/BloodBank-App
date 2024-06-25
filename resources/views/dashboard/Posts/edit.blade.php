@extends('dashboard.home')
@section('title')
    Edit Post
@endsection
 
@section('content')
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <!--Add Category -->
            <div class="text-center mt-2">
              <h4 class="text-center">@include('flash::message')</h4>
            </div>
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Edit Post</h3>
                </div>
                <form action="{{ route('dashboard.posts.update', $record->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                  <div class="card-body">
                    <div class="form-label">
                      <label>Post Title</label>
                      <div>
                          <input type="text" name="title" value="{{ $record->title }}" placeholder="Enter Title Name" class="form-control">
                      </div>
                      @error('title')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="form-label">
                      <label>Post Content</label>
                      <div>
                          <input type="text"name="content" value="{{ $record->content }}" placeholder="Enter Content Name" class="form-control">
                      </div>
                      @error('content')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="form-label mt-2">
                      <label for="oldImage">OldImage : </label>
                      <img width="200" height="160" src="{{ Storage::url($record->image) }}" alt="oldImage">
                    </div>
                    <div class="form-label">
                      <label>Image</label>
                      <div>
                          <input type="file" name="image"  class="form-control">
                      </div>
                      @error('image')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="form-label">
                      <label>Category</label>
                      <div>
                        <select name="category_id" class="form-control">
                          <option value="{{ $record->category_id }}">{{ $record->category->name }}</option>
                        </select>
                      </div>
                      @error('category_id')
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
