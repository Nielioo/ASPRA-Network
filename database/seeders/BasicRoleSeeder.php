<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class BasicRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rolesAndPermissions = [
            'RoleCRUD' => ['role-create', 'role-list', 'role-edit', 'role-delete'],
            'ProductCRUD' => ['product-create', 'product-list', 'product-edit', 'product-delete'],

            'Admin' => ['manage-users'],
            'Employee' => [],
            'Marketing' => ['oi-verify'],
            'SupervisorMarketing' => ['oi-verify'],
            'Manager' => ['oi-verify'],
            'Director' => ['oi-verify'],
            'SupervisorPPIC' => ['oi-verify'],
        ];

        foreach ($rolesAndPermissions as $roleName => $permissionNames) {
            // Check if the role already exists
            $role = Role::firstOrCreate(['name' => $roleName]);

            foreach ($permissionNames as $permissionName) {
                $role->givePermissionTo($permissionName);
            }
        }
    }
}
