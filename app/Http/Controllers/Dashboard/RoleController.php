<?php

namespace App\Http\Controllers\Dashboard;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Role::paginate(20);
        return view('dashboard.roles.index', compact('records')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('dashboard.roles.add', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Role $role)
    {
        $record = $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions_list' => 'required|array',
        ]);
        $Role = $role->create($record);

        $Role->permissions()->attach($request->permissions_list);
        
        Flash()->error('Role Added Successfully');
        return redirect(route('dashboard.role.index'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Permission $permission)
    {
        $record = Role::findOrFail($id);
        $permissions = $permission->get(); 
        return view('dashboard.roles.edit',compact('record','permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $record = $request->validate([
            'name' => 'required|unique:roles,name,'.$id,
            'permissions_list' => 'required|array',
        ]);

        $role = Role::findOrFail($id);
        $role->update($record);
        // Update permissions
        $role->permissions()->sync($request->permissions_list);
        
        flash()->success('Role Updated Successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $record = Role::findOrfail($id);
        $record->delete();

        flash('Role Deleted Successfully');
        return back();
    }
}
