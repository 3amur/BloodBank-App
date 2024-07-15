<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions(); // removed any cached permissions
        
        $arrayOfPermissionNames = [
            'users create', 'users view', 'users edit', 'users delete',
            'governments create', 'governments view', 'governments edit', 'governments delete',
            'cities create', 'cities view', 'cities edit', 'cities delete',
            'posts create', 'posts view', 'posts edit', 'posts delete',
            'categories create', 'categories view', 'categories edit', 'categories delete',
            'donationRequests create', 'donationRequests view', 'donationRequests edit', 'donationRequests delete',
            'contacts create', 'contacts view', 'contacts edit', 'contacts delete',
            'settings create', 'settings view', 'settings edit', 'settings delete',
            'messages create', 'messages view', 'messages edit', 'messages delete',
        ];

        $permissions = collect($arrayOfPermissionNames)->map(function ($permission){
            return [ 'name' => $permission , 'guard_name' => 'web'];
        });
        Permission::insert($permissions->toArray());

        $role = Role::create(['name' => 'super admin' ,'guard_name' => 'web'])->givePermissionTo($arrayOfPermissionNames);

    }
}
