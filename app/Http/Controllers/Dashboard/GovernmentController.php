<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Government;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GovernmentController extends Controller
{
    public function index(){
        $governments = Government::all();
        return view('dashboard.governments.index', compact('governments'));
    }
    public function create(){
        return view('dashboard.governments.add');
    }

    public function add(Request $request, Government $government){
        $data = $request->validate([
            'name' => 'required|min:2|max:30',
        ]);
        $government->create($data);
        return redirect()->back()->with(['success' => 'Government Added Successfully']);
    }
    public function edit(Government $government, $id)  
    {
        $government = $government->findOrFail($id);
        return view('dashboard.governments.edit', compact('government'));
    }

    public function update(Government $government, Request $request,$id)
    {
        $data = $request->validate([
            'name' => 'required | min:2 | max:30',
        ]);
        $government = $government->findOrFail($id);
        $government->update($data);
        return back()->with('success', 'Government Updated Successfully');
    }
    public function destroy(Government $government, $id)
    {
        $government = $government->findOrFail($id);
        $government->delete();
        return back()->with('success', 'Government Deleted Successfully');
    }
}
