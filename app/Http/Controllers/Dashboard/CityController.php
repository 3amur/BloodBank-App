<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\City;
use App\Models\Government;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    public function index() {
        $cities = City::with('government')->paginate(15);
        return view('dashboard.cities.index', compact('cities'));
    }
    public function create(Request $request) { 
        $governments = Government::all();
        return view('dashboard.cities.add', compact('governments'));
    }
    public function store(Request $request, City $city) { 
        $data = $request->validate([
            'name' => 'required|min:2|max:40',
            'government_id' => 'required|string|exists:governments,id'
        ]);
        $city->create($data);
        return back()->with('success', 'City Added Successfully');
    }
    public function edit(Request $request, City $city,$id) { 
        $governments = Government::all();
        $city = $city->findOrFail($id);
        return view('dashboard.cities.edit', compact('city', 'governments'));
    }
    public function update(Request $request, City $city, $id) { 
        $data = $request->validate([
            'name' => 'required|min:2|max:40',
            'government_id' => 'required|string|exists:governments,id'
        ]);
        $city = $city->findOrFail($id); 
        $city->update($data);
        return back()->with('success', 'City Updated Successfully');
    }
    public function destroy(Request $request, $id) {
        $city = City::findOrFail($id);
        $city->delete();
        return back();
    }
}
