<?php

namespace App\Http\Controllers\Api;

use App\Models\Token;
use Illuminate\Http\Request;
use App\Models\DonationRequest;
use App\Http\Controllers\Controller;

class DonationRequestController extends Controller
{
    public function createDonationRequest(Request $request, DonationRequest $donationRequest)
    {
        $validated = validator()->make($request->all(), [
            'patient_name' => 'required|min:3|max:30',
            'patient_age' => 'required',
            'blood_type_id' => 'required|exists:blood_types,id',
            'bags_number' => 'required',
            'hospital_name' => 'required',
            'hospital_address' => 'required',
            'patient_phone' => 'required|digits:11',
            'details' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'client_id' => 'required|exists:clients,id',
            'city_id' => 'required|exists:cities,id',
        ]);
        if ($validated->fails()) {
            $errors = $validated->errors()->all();
            return responseJson(0, $errors);
        }
        // create Donation Request
        $donation = $donationRequest->create($request->all());

        // finding Clients Suitable For This Donation Request
        $clientIds = $donation->city->clients()
            ->whereHas('bloodTypes', function ($q) use ($request) {
                $q->where('blood_types.id', $request->blood_type_id);
            })->pluck('clients.id')->toArray();
        
        $send = "";
        if (count($clientIds)) {
            // create notification in DB
            $notification = $donation->notifications()->create([
                'title' => 'يوجد حاله تبرع قريبه منك',
                'content' => $donation->bloodType->name . ' : محتاج متبرع لفصيله',
            ]);    
            // attach clients to send notification
            $notification->clients()->attach($clientIds);
            // send notification to clients
            $tokens = Token::whereIn('client_id', $clientIds)->where('token', '!=', null)->pluck('token')->toArray();
            if(count($tokens)){
                $title = $notification->title;
                $body = $notification->content;
                $data = [
                    'donation_request_id' => $donationRequest->id,
                ];
                $send = notifyByFirebase($title, $body, $tokens, $data);
                info('Firebase result: ' . $send);
            }
        }
        return responseJson(1, 'تم اضافه الطلب بنجاح', compact('donation', 'send'));
    }
    // Only one Donation Request
    public function donationRequest(Request $request,DonationRequest $donationRequest)
    {
        $donation = $donationRequest->with('city','client')->find($request->donation_id);
        if(!$donation){
            return responseJson(0, '404 No Donation Found');
        }
        return responseJson(1, 'success', $donation);
    }
    // list of Donation Requests
    public function donationRequests(DonationRequest $donationRequest)
    {
        $donations = $donationRequest::paginate(10);
        if(!$donations){
            return responseJson(0, '404 No Donations Found');
        }
        return responseJson(1, 'success', $donations);
    }
}
