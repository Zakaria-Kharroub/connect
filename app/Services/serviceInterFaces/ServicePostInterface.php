<?php

namespace App\Services\serviceInterFaces;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

interface ServicePostInterface
{
    public function addPost(Request $request);

    public function deletePost($id);

    public function like($id);

    public function unlike($id);

  
}
