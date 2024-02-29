<?php

namespace App\Services;

use App\Repositories\Interfaces\PostInterface;
use Illuminate\Http\Request;
use App\Services\serviceInterFaces\ServicePostInterface;

class PostService implements ServicePostInterface
{
    protected $post;

    public function __construct(PostInterface $post){
         $this->post =$post;
    }

    public function addPost(Request $request){
       return $this->post->addPost($request);
    }
}