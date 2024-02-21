<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Http\Requests\StoreFollowerRequest;
use App\Http\Requests\UpdateFollowerRequest;
use http\Client\Curl\User;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
{
    public function FollowUser($userId)
    {
        $existingFollower = Follower::where([
            ['user_id', $userId],
            ['follows_user_id',Auth::user()->id],
        ])->first();

        if ($existingFollower) {
            Follower::destroy($existingFollower->id);
            return response('unfollow', 200);
        } else {
            Follower::create([
                'user_id' => $userId,
                'follows_user_id' => Auth::user()->id,
            ]);
            return response('follow', 200);
        }
    }

    public function followUserInDetailsPage($iduser)
    {
       Follower::create([
           'user_id' =>$iduser,
           'follows_user_id' =>Auth::user()->id,
       ]);
       return redirect()->back();
    }


}
