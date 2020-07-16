<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /** @var  */
    protected $user;

    public function __construct()
    {
        $this->middleware('auth.jwt')->except(['index', 'show']);
    }

    public function index()
    {
        $posts = Post::all();
        return response()->json([
            'posts' => $posts
        ]);
    }


    public function authenticated_user_posts($id)
    {
        $authPosts = User::find($id)->post;
        return response()->json([
            'authPosts' => $authPosts
        ]);
    }

    public function posts_by_city()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Post $post)
    {
        return response()->json([
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
