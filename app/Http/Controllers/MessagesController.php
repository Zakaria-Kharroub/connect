<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use App\Http\Requests\StoreMessagesRequest;
use App\Http\Requests\UpdateMessagesRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function GetMessage($recipientId)
    {

        $messages = Messages::where('sender_id', Auth::id())
            ->where('recipient_id', $recipientId)
            ->orWhere('sender_id', $recipientId)
            ->where('recipient_id', Auth::id())
            ->orderBy('created_at', 'asc')
            ->get();
        $user = User::find($recipientId);
        return view('messages', compact('messages', 'user'));
    }

    public function sendMessage(Request $request, $recipientId)
    {
        // Create a new message
        $message = new Messages();
        $message->content = $request->input('content');
        $message->sender_id = auth()->id();
        $message->recipient_id = $recipientId;
        $message->save();
        return redirect()->back()->with('success', 'Message sent successfully.');
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
    public function store(StoreMessagesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Messages $messages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Messages $messages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMessagesRequest $request, Messages $messages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Messages $messages)
    {
        //
    }
}
