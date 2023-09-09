<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller
{
    public function chatWith(User $user )
    {

        $userA = auth()->user();
        
        $userB = $user;


        abort_unless($userA->id != $userB->id, 403);



        $chat = $userA->chats()->wherehas('users', function(Builder $query) use($userB) {
            $query->where('chat_user.user_id', $userB->id);
        })->first();
        

        if (!$chat){
            $chat = Chat::create([]);
            $chat->users()->sync([$userA->id, $userB->id]);
        }

        return redirect()->route('chat.show', $chat );

    }

    public function show(Chat $chat)
    {

        $chat->load('users');
        //dd($chat);die();
        abort_unless($chat->users->contains(auth()->id()), 403);
        
        
        return view('chat.chat', [
            'chat' => $chat,
        ]);
    }

    public function getUsers(Chat $chat)
    {   
        return response()->json([
            'users' => $chat->users()->get(),
        ]);
    }

    public function getMessages( Chat $chat)
    {
        return response()->json([
            'messages' => $chat->messages()->with('user')->get(),
        ]);
    }

}
