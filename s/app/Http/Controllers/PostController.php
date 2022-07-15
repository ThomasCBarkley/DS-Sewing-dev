<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends \Illuminate\Routing\Controller
{
    /**
     * Show the application dashboard.
     */
    public function index(Request $request): View
    {
        return view('posts.index', [
            'posts' => Post::search($request->input('q'))
                ->published()
                ->orderBy('publish_at', 'desc')
                ->paginate(10)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Post $post): View
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
