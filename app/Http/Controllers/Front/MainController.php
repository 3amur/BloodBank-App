<?php

namespace App\Http\Controllers\Front;

use App\Models\Post;
use App\Models\BloodType;
use App\Models\Government;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DonationRequest;

class MainController extends Controller
{
    public function home(){

        $bloodTypes = BloodType::all();
        $governments = Government::all();
        $posts = Post::take(9)->get();
        $donationRequests = DonationRequest::take(4)->get();
        return view('front.home', compact('posts', 'bloodTypes', 'governments','donationRequests'));
    }
}
