<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Post::paginate(20);
        return view('dashboard.Posts.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.Posts.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|min:3|max:200',
            'content' => 'required|min:3|max:1000',
            'image' => 'image|mimes:jpg,jpeg,png,gif,svg,ico,webp',
            'category_id' => 'required|exists:categories,id'
        ]);
        // Upload image && change Name
        if($request->hasFile('image')){
            $requests = $request->all();
            $image = $request->file('image');
            $imageName = Str::uuid() . '.' . time() . '.' . rand(1,1000) . '.' . $image->getClientOriginalName();
            $path = $image->storeAs('postImages',$imageName,'public');
            $imageUrl= $path;

            $requests['image'] = $imageUrl;            
            $post->create($requests);

            flash()->success('Post Added Successfully');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $record = Post::with('category')->findOrFail($id);
        return view('dashboard.Posts.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $post = Post::findOrFail($id);
        $request->validate([
            'title' => 'required|min:3|max:200',
            'content' => 'required|min:3|max:1000',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,ico,webp',
            'category_id' => 'required|exists:categories,id'
        ]);
        $requests = $request->all();
        // Handle the image upload if a new image is provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::uuid() . '.' . time() . '.' . rand(1, 1000) . '.' . $image->getClientOriginalName();
            $path = $image->storeAs('postImages', $imageName, 'public');
            $requests['image'] = $path;
            // Optionally, delete the old image from storage if needed
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
        } else {
            // If no new image is uploaded, do not overwrite the existing image
            unset($requests['image']);
        }

        $post = Post::findOrFail($id);
        $post->update($requests);
    
        flash()->success('Post Updated Successfully');
        return redirect()->back();
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        flash()->error('Post deleted successfully');
        return back();
    }
}
