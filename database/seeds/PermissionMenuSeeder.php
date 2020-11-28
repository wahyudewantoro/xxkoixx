<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Permission::create(['name' => 'jenisikan.list']);
        Permission::create(['name' => 'jenisikan.create']);
        Permission::create(['name' => 'jenisikan.edit']);
        Permission::create(['name' => 'jenisikan.delete']);

        Permission::create(['name' => 'biaya.list']);
        Permission::create(['name' => 'biaya.create']);
        Permission::create(['name' => 'biaya.edit']);
        Permission::create(['name' => 'biaya.delete']);


        Permission::create(['name' => 'poin.list']);
        Permission::create(['name' => 'poin.create']);
        Permission::create(['name' => 'poin.edit']);
        Permission::create(['name' => 'poin.delete']);
        // create roles and assign created permissions
        $role = Role::where('name', 'Admin Probis')->first();
        $role->givePermissionTo(Permission::all());
    }
}
