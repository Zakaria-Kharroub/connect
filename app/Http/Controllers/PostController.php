<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use App\Models\Like;
use App\Services\serviceInterFaces\ServicePostInterface as ServiceInterFacesServicePostInterface;

// use App\Services\Post\PostInterface;
// use App\Services\serviceInterFaces\PostInterface ;

class PostController extends Controller
{

    protected $post;

    public function __construct(ServiceInterFacesServicePostInterface $post)
    {
        $this->post = $post;
    }

    public function addPost(Request $request)
    {


        $this->post->addPost($request);

        return redirect('/dashboard');
    }







    public function myPosts(Request $request)
    {
        $user_id = auth()->id();
        $posts = Post::where('user_id', $user_id)->get();
        $comment= Comment::all();
        return view('dashboard', compact('posts', 'comment'));

    }

    public function deletePost(Request $request, $id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('dashboard');

    }


    public function like(Request $request, $id){
     $like = new Like;
      $like->user_id = auth()->user()->id;
     $like->post_id = $id;
      $like->save();

    return redirect()->route('index');
}

public function unlike($id){
    $like = Like::where('user_id', auth()->user()->id)->where('post_id', $id)->first();
    if($like){
        $like->delete();
    }
    return redirect()->route('index');

}




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
