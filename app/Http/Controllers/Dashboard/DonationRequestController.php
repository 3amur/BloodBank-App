<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\DonationRequest;
use Illuminate\Http\Request;

class DonationRequestController extends Controller
{
    public function index(){
        $records = DonationRequest::with(['bloodType', 'client', 'city'])->paginate(20);
        return view('dashboard.donation_requests.index', compact('records'));
    }

    public function search(Request $request, DonationRequest $donationRequest){
        $records = $donationRequest->where('patient_name', 'LIKE', '%'. $request->search .'%')
        ->orWhere('patient_age', 'LIKE', '%'. $request->search .'%')
        ->orWhere('bags_number', 'LIKE', '%'. $request->search .'%')
        ->with(['bloodType', 'client', 'city'])->paginate(20);
        return view('dashboard.donation_requests.index', compact('records'));
    }

    public function show(DonationRequest $donationRequest, $id){
        $record = $donationRequest->with(['bloodType', 'client', 'city'])->findOrFail($id);
        return view('dashboard.donation_requests.show', compact('record'));
    } 

    public function destroy(DonationRequest $donationRequest, $id){
        $record = $donationRequest->findOrFail($id);
        $record->delete();

        flash()->success('Donation Request deleted successfully');
        return back();
    }
}
