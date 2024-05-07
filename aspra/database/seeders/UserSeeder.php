<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function assignNewRolesToUser($user, $rolesAndPermissions)
    {
        $roleIds = [];

        foreach ($rolesAndPermissions as $roleName => $permissionName) {
            // Check if the role already exists
            $role = Role::firstOrCreate(['name' => $roleName]);
            $permission = Permission::where('name', $permissionName)->first();

            $role->syncPermissions($permission);
            $role->givePermissionTo($permission);

            $roleIds[] = $role->id;
        }

        $user->assignRole($roleIds);
    }

    public function assignExistingRolesToUser($user, $roleNames)
    {
        $roleIds = [];

        foreach ($roleNames as $roleName) {
            // Check if the role already exists
            $role = Role::where('name', $roleName)->first();

            if (!$role) {
                // If the role does not exist, skip to the next iteration
                continue;
            }

            $roleIds[] = $role->id;
        }

        $user->assignRole($roleIds);
    }


    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User One
        $userOne = User::create([
            'name' => 'One',
            'email' => 'one@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        $newRolesAndPermissions = [
            'VerifyOne' => 'verify-one',
        ];

        $this->assignNewRolesToUser($userOne, $newRolesAndPermissions);
        $this->assignExistingRolesToUser($userOne, ['RoleCRUD','ProductCRUD']);

        // User Two
        $userTwo = User::create([
            'name' => 'Two',
            'email' => 'two@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        $newRolesAndPermissions = [
            'VerifyTwo' => 'verify-two',
        ];

        $this->assignNewRolesToUser($userTwo, $newRolesAndPermissions);
        $this->assignExistingRolesToUser($userTwo, ['ProductCRUD']);

        // Random Users
        User::create([
            'name' => 'Adam Smith',
            'email' => 'adam@gmail.com',
            'password' => Hash::make('12345678')
        ]);
        User::create([
            'name' => 'Ben Franklin',
            'email' => 'ben@gmail.com',
            'password' => Hash::make('12345678')
        ]);
        User::create([
            'name' => 'Carol Carter',
            'email' => 'Carol@gmail.com',
            'password' => Hash::make('12345678')
        ]);
        User::create([
            'name' => 'Daniel Aprillio',
            'email' => 'daniel@gmail.com',
            'password' => Hash::make('12345678')
        ]);
        User::create([
            'name' => 'Emily Johnson',
            'email' => 'emily@gmail.com',
            'password' => Hash::make('12345678')
        ]);

    }
}
