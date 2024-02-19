<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    public function addPost(Request $request){

        $request->validate([
            'content' => 'required',
            'user_id' => 'required',
            'date_creation' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);



        $post = new Post();
        $post->content = $request->input('content');
        $post->user_id = $request->input('user_id');
        $post->date_creation = $request->input('date_creation');
        $post->image = $request->image;


        if($request->hasFile('image')){
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/images', $name);
            $post->image = $name;
        }

        $post->save();

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
