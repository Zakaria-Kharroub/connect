<?php

namespace App\Repositories\Interfaces;
use Illuminate\Http\Request;
use App\Models\Post;

use App\Repositories\Interfaces\PostInterface;

class PostRepo implements PostInterface
{
    public function addPostIntreFace(Request $request)
    {
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
}
