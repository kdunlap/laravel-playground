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
            'name' => 'View Any User',
            'slug' => 'user_viewAny',
        ]);
        $admin_role->permissions()->create([
            'name' => 'Create Users',
            'slug' => 'user_create',
        ]);
        $admin_role->permissions()->create([
            'name' => 'Update Users',
            'slug' => 'user_update',
        ]);
        $admin_role->permissions()->create([
            'name' => 'Delete Users',
            'slug' => 'user_delete',
        ]);

        Role::create([
            'name' => 'User',
            'slug' => 'user',
        ]);
    }
}
