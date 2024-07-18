<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = User::paginate(10);
        return view('dashboard.users.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('dashboard.users.add', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {
        $record = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|string',
            'roles_list' => 'required|array',
        ]);
        $request->merge(['password' => bcrypt($request->password)]);
        $user = $user->create($record);
        // Choose Roles
        $user->assignRole($request->roles_list);

        flash()->success('User Created Successfully');
        return redirect(route('dashboard.users.index'));
    }

    /**
     * Change Password Page.
     */
    public function changePassword()
    {        
        return view('dashboard.users.change_password');
    }

    /**
     * Update Password.
     */
    public function updatePassword(Request $request)
    {
        // Validate input data
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);
        // Get the currently authenticated user
        $user = Auth::user();
        // Check if user is authenticated
        if (!$user) {
            return 'User not authenticated' ;
        }
        // Check if the old password matches the current password
        if (Hash::check($request->old_password, $user->password)) {
            // Update the password
            $user->password = bcrypt($request->new_password);
            $user->save();
            // Flash success message
            flash()->success('Password changed successfully');
            // Return back with a success message
            return back();
        } else {
            // Return an error message if old password does not match
            return 'Old Password in Correct' ;
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $record = User::findOrFail($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRoles = $record->roles->pluck('name', 'name')->all();
        return view('dashboard.users.edit', compact('record', 'roles', 'userRoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $record = $request->validate([
            'name' => 'required',
            'email' => 'unique:users,email,' . $id,
            'password' => 'nullable|string',
            'roles_list' => 'required|array',
        ]);
        $request->merge(['password' => bcrypt($record['password'])]);
        $user = User::findOrFail($id);
        $user->update($record);
        // Update Roles
        $user->syncRoles($request->roles_list);

        flash()->success('User Updated Successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        flash()->error('User Deleted Successfully');
        return back();
    }
}
