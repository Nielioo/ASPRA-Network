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
            'uname' => 'one',
            'email' => 'one@gmail.com',
            'position' => 'one',
            'phone_number' => '6285112341201',
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
            'uname' => 'two',
            'email' => 'two@gmail.com',
            'position' => 'two',
            'phone_number' => '6285112341202',
            'password' => Hash::make('12345678')
        ]);

        $newRolesAndPermissions = [
            'VerifyTwo' => 'verify-two',
        ];

        $this->assignNewRolesToUser($userTwo, $newRolesAndPermissions);
        $this->assignExistingRolesToUser($userTwo, ['ProductCRUD']);

        // Random Users
        $adam = User::create([
            'name' => 'Adam Smith',
            'uname' => 'adam',
            'email' => 'adam@gmail.com',
            'position' => 'Employee',
            'phone_number' => '6285112341203',
            'password' => Hash::make('12345678')
        ]);
        $this->assignExistingRolesToUser($adam, ['Employee']);

        $adi = User::create([
            'name' => 'Adi Prasetya',
            'uname' => 'adi',
            'email' => 'adi@gmail.com',
            'position' => 'Employee',
            'phone_number' => '6285112341233',
            'password' => Hash::make('12345678')
        ]);
        $this->assignExistingRolesToUser($adi, ['Employee']);

        $ben = User::create([
            'name' => 'Ben Franklin',
            'uname' => 'ben',
            'email' => 'ben@gmail.com',
            'position' => 'Marketing',
            'phone_number' => '6285112341204',
            'password' => Hash::make('12345678')
        ]);
        $this->assignExistingRolesToUser($ben, ['Marketing']);

        $boby = User::create([
            'name' => 'Boby Budiman',
            'uname' => 'boby',
            'email' => 'boby@gmail.com',
            'position' => 'Marketing',
            'phone_number' => '6285112341294',
            'password' => Hash::make('12345678')
        ]);
        $this->assignExistingRolesToUser($boby, ['Marketing']);

        $carol = User::create([
            'name' => 'Carol Carter',
            'uname' => 'carol',
            'email' => 'Carol@gmail.com',
            'position' => 'Supervisor Marketing',
            'phone_number' => '6285112341205',
            'password' => Hash::make('12345678')
        ]);
        $this->assignExistingRolesToUser($carol, ['SupervisorMarketing']);

        $carmile = User::create([
            'name' => 'Carmile Miles',
            'uname' => 'carmile',
            'email' => 'Carmile@gmail.com',
            'position' => 'Supervisor Marketing',
            'phone_number' => '6285112341295',
            'password' => Hash::make('12345678')
        ]);
        $this->assignExistingRolesToUser($carmile, ['SupervisorMarketing']);

        $daniel = User::create([
            'name' => 'Daniel Aprillio',
            'uname' => 'daniel',
            'email' => 'daniel@gmail.com',
            'position' => 'Manager',
            'phone_number' => '6285105118880',
            'password' => Hash::make('12345678')
        ]);
        $this->assignExistingRolesToUser($daniel, ['Manager']);

        $emily = User::create([
            'name' => 'Emily Johnson',
            'uname' => 'emily',
            'email' => 'emily@gmail.com',
            'position' => 'Director',
            'phone_number' => '6285112341207',
            'password' => Hash::make('12345678')
        ]);
        $this->assignExistingRolesToUser($emily, ['Director']);

        $fiona = User::create([
            'name' => 'Fiona Hubert',
            'uname' => 'fiona',
            'email' => 'fiona@gmail.com',
            'position' => 'Supervisor PPIC',
            'phone_number' => '6285112341208',
            'password' => Hash::make('12345678')
        ]);
        $this->assignExistingRolesToUser($fiona, ['SupervisorPPIC']);

    }
}
