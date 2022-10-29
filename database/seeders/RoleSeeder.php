<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'mantenimiento']);
        $role3 = Role::create(['name' => 'prevencion']);
        $role4 = Role::create(['name' => 'usuario']);

        Permission::create(['name' => 'admin'])->assignRole($role1);
        Permission::create(['name' => 'manage'])->syncRoles([$role2, $role3]);
        Permission::create(['name' => 'user'])->syncRoles([$role4]);
        
    }
}
