<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin_role = Role::where('slug', 'admin')->first();
        $admin_user = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);
        $admin_user->roles()->attach($admin_role);

        $user_role = Role::where('slug', 'user')->first();
        User::factory(10)->create()
        ->each(function ($user) use ($user_role) {
            $user->roles()->attach($user_role);
        });
    }
}
