<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface PostInterface
{
    public function addPost(Request $request);
    public function deletePost($id);

     public function like($id);
        public function unlike($id);
}
