@extends('dashboard.home')
@section('title')
    Add Post
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
                    <h3 class="card-title">Add Post</h3>
                </div>
                <form action="{{ route('dashboard.posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-label">
                            <label>Post Title</label>
                            <div>
                                <input type="text" name="title" placeholder="Enter Title Name" class="form-control">
                            </div>
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-label">
                            <label>Post Content</label>
                            <div>
                                <input type="text" name="content" placeholder="Enter Content Name" class="form-control">
                            </div>
                            @error('content')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-label">
                            <label>Image</label>
                            <div>
                                <input type="file" name="image" class="form-control">
                            </div>
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-label">
                            <label>Category</label>
                            <div>
                              <select name="category_id" class="form-control">
                                @foreach ($categories as $category)
                                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                              </select>
                            </div>
                            @error('category')
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
