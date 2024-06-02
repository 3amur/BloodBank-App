<?php

namespace App\Http\Controllers\Api;

use App\Models\City;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Setting;
use App\Models\Category;
use App\Models\BloodType;
use App\Models\Government;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    // Blood Types
    public function bloodTypes()
    {
        $types = BloodType::all();
        return responseJson(1, 'success', $types);
    }
    // Governments
    public function governments()
    {
        $governments = Government::all();
        return responseJson(1, 'success', $governments);
    }
    // Cities
    public function cities(Request $request)
    {
        $cities = City::where(function ($query) use ($request) {
            if ($request->has('government_id')) {
                $query->where('government_id', $request->government_id);
            }
        })->get();
        return responseJson(1, 'success', $cities);
    }
    // Settings
    public function settings()
    {
        $settings = Setting::find(1);
        return responseJson(1, 'success', $settings);
    }
    // Categories
    public function categories()
    {
        $categories = Category::all();
        return responseJson(1, 'success', $categories);
    }
    // Contact Us
    public function contactUs(Request $request, Contact $contact)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:30',
            'email' => 'required|email|unique:clients,email|max:40',
            'phone' => 'required|string|min:5|max:20',
            'subject' => 'required|string|max:1000',
            'message' => 'required|string|max:1500',
            'client_id' => 'required|integer'
        ]);

        $contacts = Contact::create($validated);
        return responseJson(1, 'success', $contacts);
    }
    // Notification Settings
    public function notificationSettings(Request $request, Client $client)
    {
        $validated = validator()->make($request->all(), [
            'blood_type_id' => 'required|exists:blood_types,id|string',
            'city_id' => 'required|exists:cities,id',
        ]);
        if ($validated->fails()) {
            $errors = $validated->errors()->all();
            return responseJson(0, $errors);
        }
        $client = $request->user();
        $client->update($request->all());
        if ($client->save()) {
            return responseJson(1, 'تم اضافه الاشعارات بنجاح', $client);
        }
        //Blood types
        if ($request->has('blood_type_id')) {
            $bloodType = BloodType::where('name', $request->blood_type_id)->first();
            $client->bloodTypes()->sync($bloodType);
        }
        //city
        if ($request->has('city_id')) {
            $client->cities()->sync($request->city_id);
        }
    }
}
