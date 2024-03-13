<?php

namespace App\Services;

use App\Repositories\Interfaces\PostInterface;
use Illuminate\Http\Request;
use App\Services\serviceInterFaces\ServicePostInterface;
use App\Models\Post;
use App\Models\User;


class PostService implements ServicePostInterface
{
    protected $post;

    public function __construct(PostInterface $post){
         $this->post =$post;
    }

    public function addPost(Request $request){
       return $this->post->addPost($request);
    }

    public function deletePost($id){
        return $this->post->deletePost($id);
    }

    public function like($id){
        return $this->post->like($id);
    }

    public function unlike($id){
        return $this->post->unlike($id);
    }







}
