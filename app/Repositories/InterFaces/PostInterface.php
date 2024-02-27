<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface PostInterface
{
    public function addPost(Request $request);
}
