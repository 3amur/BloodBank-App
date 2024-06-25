<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Category::paginate(20);
        return view('dashboard.categories.index', compact('records')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Category $category)
    {
        $record = $request->validate([
            'name' => 'required|min:3|max:40|unique:categories,name',
        ]);
        $category->create($record);
        
        Flash()->success('Category Added Successfully');
        return redirect(route('dashboard.categories.index'));
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
        $record = Category::findOrFail($id);
        return view('dashboard.Categories.edit',compact('record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $record = $request->validate([
            'name' => 'required|min:3|max:40|unique:categories,name'
        ]);
        $category = Category::findOrFail($id);
        $category->update($record);
        
        flash('Category Updated Successfully');
        return redirect(route('dashboard.categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $record = Category::findOrfail($id);
        $record->delete();

        flash('Category Deleted Successfully');
        return back();
    }
}
