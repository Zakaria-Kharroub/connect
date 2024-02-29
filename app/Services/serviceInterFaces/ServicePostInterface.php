<?php

namespace App\Services\serviceInterFaces;

use Illuminate\Http\Request;

interface ServicePostInterface
{
    public function addPost(Request $request);
}
