<?php

namespace App\Services\serviceInterFaces;

use Illuminate\Http\Request;

interface ServicePostInterface
{
    public function addPost(Request $request);

    public function deletePost($id);

    public function like($id);

    public function unlike($id);
}
