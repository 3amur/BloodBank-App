<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index(){
        $records = Contact::paginate(20);
        return view('dashboard.contacts.index', compact('records'));
    }

    public function search(Request $request, Contact $contact){
        $records = $contact->where('message', 'LIKE', '%'. $request->search .'%')
        ->orWhere('name' , 'LIKE', '%'. $request->search .'%')
        ->orWhere('email' , 'LIKE', '%'. $request->search .'%')
        ->paginate(20);
        return view('dashboard.contacts.index', compact('records'));
    }

    public function destroy(Contact $contact, $id){
        $record = $contact->findOrFail($id);
        $record->delete();
        
        flash()->success('Contact deleted successfully');
        return redirect()->back();
    }
}
