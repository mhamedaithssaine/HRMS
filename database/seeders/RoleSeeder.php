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
            'manage Emplyees',
            'maange Emplyois',
            'maange Departments',
            'maange Hierarchy',
            'maange Conges',
            'notification',
            'manage profile',

        ],
        'rh'=>[
            'manage Emplyees',
            'maange Emplyois',
            'maange Hierarchy',
            'maange Conges',
            'notification',
            'manage profile',
           

        ],
        'manager'=>[
            'maange Hierarchy',
            'maange Conges',
            'notification',
            'manage profile',
            'demande conges',
        ],
        'employee'=>[
            'maange Hierarchy',
            'manage profile',
            'demande conges',
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
