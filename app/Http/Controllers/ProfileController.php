<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\Profile;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('profile.edit');
    }

    public function FollowUserDetailsPage($userId)
    {
        $user = User::find($userId);
        $existingFollower = Follower::where('user_id', $userId)->first();

        $result = ($existingFollower) ? 'following' : 'NotFollowing';

        return view('profile.edit', compact('result' , 'user'));
    }

    public function unfollowUser($id)
    {
        Follower::where('follows_user_id', $id)->delete();
        return redirect()->back();
    }

    public function followOrUnfollowUser($userId)
    {
        $existingFollower = Follower::where([
            ['user_id', $userId],
            ['follows_user_id', Auth::user()->id],
        ])->first();

        if ($existingFollower) {
            $existingFollower->delete();
            return response()->json('unfollowed');
        } else {
            Follower::create([
                'user_id' => $userId,
                'follows_user_id' => Auth::user()->id,
            ]);
            return response()->json('followed');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }


}
