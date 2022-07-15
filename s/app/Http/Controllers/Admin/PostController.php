<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PostsRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Show the application posts index.
     */
    public function index(): View
    {
        return view('admin.posts.index', [
            'posts' => Post::latest()->paginate(50)
        ]);
    }

    /**
     * Display the specified resource edit form.
     */
    public function edit(Post $post): View
    {
        return view('admin.posts.edit', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        return view('admin.posts.create', [
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostsRequest $request): RedirectResponse
    {
        $post = Post::create($request->only([
            'title',
            'meta_title',
            'meta_keywords',
            'meta_description',
            'short_description',
            'slug',
            'body',
            'publish_at'
        ]));

        return redirect()->route('admin.posts.edit', $post)->withSuccess('Created');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostsRequest $request, Post $post): RedirectResponse
    {
        $post->update($request->only([
            'title',
            'meta_title',
            'meta_keywords',
            'meta_description',
            'short_description',
            'slug',
            'body',
            'publish_at'
        ]));

        return redirect()->route('admin.posts.edit', $post)->withSuccess('Updated');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->withSuccess('Deleted');
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
