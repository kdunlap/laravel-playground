<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_ids = User::all('id');

        User::all('id')->each(function(User $author) use ($user_ids) {
            Post::factory(10)
                ->for($author, 'author')
                ->create()
                ->each(function(Post $post) use ($user_ids) {
                    $author = $user_ids->random();
                    Comment::factory(3)
                        ->for($post)
                        ->for($author, 'author')
                        ->create();
                });
        });

        
    }
}
