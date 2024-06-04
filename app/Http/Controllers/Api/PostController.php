<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\Client;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function createPost(Request $request, Post $post){
        $validated = validator()->make($request->all(),[
            'title' => 'required|min:3|max:200',
            'content' => 'required|min:3|max:1000',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg,ico,webp',
        ]);
        if($validated->fails()){
            $errors = $validated->errors()->first();
            return responseJson(0, $errors);
        }
        // Upload image && change Name
        if($request->hasFile('image')){
            $requests = $request->all();
            $image = $request->file('image');
            $imageName = Str::uuid() . '.' . time() . '.' . rand(1,1000) . '.' . $image->getClientOriginalName();
            $path = $image->storeAs('postImages',$imageName,'public');
            $imageUrl= '/storage/'.$path;

            $requests['image'] = $imageUrl;            
            $post->create($requests);
            return responseJson(1, 'تم اضافه المنشور بنجاح', $requests);
        }
    }
    public function posts(){
        $posts = Post::with('category')->paginate(10);
        if(!$posts){
            return responseJson(0, 'Posts not found');
        }
        return responseJson(1, 'success', $posts);
    }
    // favouritePost
    public function favouritePost(Request $request, Client $client){
        $validated = validator()->make($request->all(), [
            'post_id' => 'required|exists:posts,id'
        ]);
        if($validated->fails()) {
            $errors = $validated->errors()->first();
            return responseJson(0, $errors);
        }
        // Favourite Post
        $client = $request->user()->posts()->toggle($request->post_id);
        return responseJson(1, 'success', $client);
    }
    // list of Favourite Posts
    public function favouritePosts(Request $requeset){
        $favourites = $requeset->user()->posts()->paginate(10);
        return responseJson(1, 'success', $favourites);
    }
}
