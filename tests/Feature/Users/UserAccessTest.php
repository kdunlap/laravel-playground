<?php

namespace Tests\Feature\Users;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_are_unable_to_access_the_users_page()
    {
        $response = $this->get('/users');
        $response->assertStatus(403);
    }

    public function test_users_with_role_viewAny_can_visit_the_users_page()
    {
        $user = User::factory()
            ->has(
                Role::factory()
                    ->has(Permission::factory()
                        ->state([
                            'name' => 'Can view any user', 
                            'slug' => 'user_viewAny'
                        ]))
                    ->state([
                        'name' => 'admin', 
                        'slug' => 'admin' 
                    ])
            )
            ->create();
        $this->actingAs($user);

        $response = $this->get('/users');
        $response->assertStatus(200);
    }
}
