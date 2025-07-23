<?php

namespace Database\Seeders;

use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $adminRole = Role::create([
            'name' => 'admin'
        ]);
        $userRole = Role::create([
            'name' => 'user'
        ]);

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'test@admin.com',
            'username' => 'admin',
            'password' => bcrypt('123'),
        ], );

        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@user.com',
            'username' => 'testuser',
            'password' => bcrypt('123'),
        ], );

        $admin->assignRole($adminRole);
        $user->assignRole($userRole);
    }
}
