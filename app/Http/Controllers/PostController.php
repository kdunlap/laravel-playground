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

        return Inertia::render('posts/Index', [
            'posts' => Post::all(),
        ]);
    }
}
