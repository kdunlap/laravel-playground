<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin_role = Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
        ]);
        $admin_role->permissions()->create([
            'name' => 'View Users',
            'slug' => 'view-users',
        ]);
        $admin_role->permissions()->create([
            'name' => 'Create Users',
            'slug' => 'create-users',
        ]);
        $admin_role->permissions()->create([
            'name' => 'Update Users',
            'slug' => 'update-users',
        ]);
        $admin_role->permissions()->create([
            'name' => 'Delete Users',
            'slug' => 'delete-users',
        ]);

        Role::create([
            'name' => 'User',
            'slug' => 'user',
        ]);
    }
}
