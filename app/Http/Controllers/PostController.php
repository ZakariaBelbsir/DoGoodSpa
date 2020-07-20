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
        $this->middleware('auth.jwt')->except(['index', 'show', 'PostsByCity']);
    }

    public function index()
    {
        return response()->json([
            'posts' => Post::all()
        ]);
    }


    public function AuthPosts()
    {
        return response()->json([
            'authPosts' => auth()->user()->post
        ]);
    }

    public function PostsByCity($city_id)
    {
        $posts = [];
        $users = User::where('city_id', $city_id)->get();
        foreach ($users as $user){
            $userPost = $user->post;
            if(!empty($userPost)) {
                array_push($posts, $userPost);
            }
        }
        return response()->json([
            'posts' => $posts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $post = $request->validate([
            'title' => 'required',
            'body' => 'required|min:150'
        ]);

        $post['user_id'] = auth()->id();

        Post::create($post);
        return response()->json([
            'message' => 'Votre poste a été crée avec succés'
        ]);
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
