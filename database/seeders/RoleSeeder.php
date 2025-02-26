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
     */
    public function run(): void
    {
      $roles=[
        'admin'=>[
            'manage users',
            'maange emplyees',
            'maange departments',
            'maange roles',
            'maange settings',

        ],
        'rh'=>[
            'maange emplyees',
            'view emplyees',
            'maange contrats',
            'maange formation',

        ],
        'manager'=>[
            'view emplyees',
            'manage team',
        ],
        'employee'=>[
            'view prfile',
            'edit profile',
        ],
    ];

        foreach ($roles as $roleName => $permissions) {
            $role = Role::firstOrCreate(['name' => $roleName]);

            foreach ($permissions as $permissionName) {
                $permission = Permission::firstOrCreate(['name' => $permissionName]);
                $role->givePermissionTo($permission);
            }
        }

    }
}
