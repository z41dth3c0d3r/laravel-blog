<?php

namespace App\Http\Controllers;

use App\Actions\Post\CreatePostAction;
use App\Actions\Post\DeletePostAction;
use App\Actions\Post\GetAllPostsAction;
use App\Actions\Post\GetPostAction;
use App\Actions\Post\GetPostsByUserAction;
use App\Actions\Post\UpdatePostAction;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use App\DTO\Post\CreatePostDTO;
use App\DTO\Post\UpdatePostDTO;
use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Route;

class PostController extends Controller
{
    public function home(GetAllPostsAction $getAllPostsAction)
    {
        $posts = $getAllPostsAction->handle();

        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'posts' => PostResource::collection($posts)
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(GetPostsByUserAction $getPostsByUserAction)
    {
        $posts = $getPostsByUserAction->handle(auth()->id());
        return Inertia::render("Posts/Index", [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render("Posts/Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePostRequest $request, CreatePostAction $createPostAction): RedirectResponse
    {
        $postData = new CreatePostDTO($request->title, $request->content, $request->user()->id);
        $createPostAction->handle($postData->toArray());

        return redirect()->route("posts.index")->with('message', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post, GetPostAction $getPostAction)
    {
        $post = $getPostAction->handle($post->id);
        return Inertia::render("Posts/Show", [
            'post' => $post,
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $this->authorize('edit', $post);
        return Inertia::render("Posts/Edit", [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post, UpdatePostAction $UpdatePostAction)
    {
        $this->authorize('update', $post);

        $newPostDetails = new UpdatePostDTO($post->id, $request->title, $request->content, $request->user()->id);

        $UpdatePostAction->handle($post->id, $newPostDetails->toArray());

        return redirect()->route("posts.index")->with('message', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post, DeletePostAction $deletePostAction)
    {
        $this->authorize('delete', $post);
        $deletePostAction->handle($post->id);

        return back()->with('message', 'Post deleted successfully!');
    }
}
