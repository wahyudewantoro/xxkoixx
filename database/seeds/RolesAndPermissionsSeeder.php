<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'user.list']);
        Permission::create(['name' => 'user.role']);
        Permission::create(['name' => 'role.list']);
        Permission::create(['name' => 'role.create']);
        Permission::create(['name' => 'role.edit']);
        Permission::create(['name' => 'role.delete']);
        
        Permission::create(['name' => 'permissions.list']);
        Permission::create(['name' => 'permissions.create']);
        Permission::create(['name' => 'permissions.edit']);
        Permission::create(['name' => 'permissions.delete']);

        // create roles and assign created permissions
        $role = Role::create(['name' => 'Admin Probis']);
        $role->givePermissionTo(Permission::all());

        // assign role user
        $user=User::where('name','Administrator')->first();
        $user->assignRole('Admin Probis');
    }
}
