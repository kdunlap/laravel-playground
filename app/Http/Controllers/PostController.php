<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index(Request $request)
    {
        Gate::authorize('viewAny', $request->user());

        $posts_per_page = 5;
        return Inertia::render('posts/Index', [
            'posts' => Post::with('author')->paginate($posts_per_page),
        ]);
    }

    public function show(Request $request, string $slug)
    {
        Gate::authorize('view', $request->user());

        return Inertia::render('posts/Show', [
            'post' => Post::with(['author', 'comments'])->where('slug', $slug)->first(),
        ]);
    }
}
