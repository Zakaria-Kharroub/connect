<?php

namespace App\Repositories;
use App\Models\User;
use App\Repositories\InterFaces\MessagesInterFaces;
use App\Models\Messages;
use Illuminate\Support\Facades\Auth;

class MessagesRepo implements MessagesInterFaces
{
    public function recieveMessage($recipientId)
    {
         $allMessages = Messages::where('sender_id', Auth::id())
            ->where('recipient_id', $recipientId)
            ->orWhere('sender_id', $recipientId)
            ->where('recipient_id', Auth::id())
            ->orderBy('created_at', 'asc')
            ->get();

        return $allMessages;
    }

}
