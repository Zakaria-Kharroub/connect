<?php

namespace App\Http\Controllers;

use App\Models\Front;
use App\Http\Requests\StoreFrontRequest;
use App\Http\Requests\UpdateFrontRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::take(5)->get();
        $posts = Post::all();
        return view('hero', compact('users','posts'));
        

    }



    public function find(Request $request)
    {
        $query = $request->input('query');
        $users = User::where('name', 'like', "%$query%")->get();

        // Return the search results
        return response()->json($users);
    }


    public function message()
    {
        return view('messages');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFrontRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Front $front)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Front $front)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFrontRequest $request, Front $front)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Front $front)
    {
        //
    }
}
