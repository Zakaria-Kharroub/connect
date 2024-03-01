<?php

namespace App\Repositories;

use App\Repositories\Interfaces\PostInterface;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;

class PostRepo implements PostInterface
{
    public function addPost(Request $request){

        $request->validate([
            'content'=> 'required',
            'user_id'=> 'required',
            'date_creation' => 'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $post = new Post();
        $post->content =$request->input('content');
        $post->user_id= $request->input('user_id');
        $post->date_creation = $request->input('date_creation');



        if($request->hasFile('image')){

           $image = $request->file('image');
            $name=time().'.'.$image->getClientOriginalExtension();
            $image =$image->storeAs('public/images', $name);
             $post->image = $name;
        }

        $post->save();
    }




    public function deletePost($id){
        $post = Post::find($id);
        $post->delete();
    }




    public function like($id){
        $like = new Like;
      $like->user_id = auth()->user()->id;
     $like->post_id = $id;
      $like->save();
    }

    public function unlike($id){
        $like = Like::where('user_id', auth()->user()->id)->where('post_id', $id)->first();
    if($like){
        $like->delete();
    }
}
}
