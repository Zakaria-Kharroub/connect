<?php

namespace App\Repositories;

use App\Repositories\Interfaces\PostInterface;
use Illuminate\Http\Request;
use App\Models\Post;

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
}
