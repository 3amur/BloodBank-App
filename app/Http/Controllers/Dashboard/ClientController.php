<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function index()
    {
        $records = Client::with(['bloodType', 'city'])->paginate(20);
        return view('dashboard.clients.index', compact('records'));
    }

    public function search(Request $request)
    {
        $records = Client::where('name', 'LIKE', '%' . $request->search . '%')
        ->orWhere('is_active', 'LIKE', '%'. $request->search .'%')
        ->with(['bloodType', 'city'])->paginate(20);
        return view('dashboard.clients.index', compact('records'));
    }

    public function active(Client $client, $id)
    {
        $active = $client->findOrFail($id);
        $active->is_active = '1';
        $active->save();

        flash()->success('Client Activated Successfully');
        return back();
    }

    public function deActive($id, Client $client)
    {
        $deactive = $client->findOrFail($id);
        $deactive->is_active = '0';
        $deactive->save();

        flash()->error('Client De Activated Successfully');
        return back();
    }

    public function destroy(Client $client, $id)
    {
        $client = $client->findOrFail($id);
        $client->delete();

        flash()->error('Client deleted successfully');
        return back();
    }
}
