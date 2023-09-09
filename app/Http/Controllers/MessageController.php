<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Log;
use App\Models\Message;

use Exception;

class MessageController extends Controller
{

    public function sent(Request $request)
    {   
        try{
            /*$message = auth()->user()->messages()->create([            
                'content' => $request->message,
                'chat_id' => $request->chat_id,
            ])->load('user');*/

            $message = Message::create([
                'content' => $request->message,
                'chat_id' => $request->chat_id,
                'user_id' => auth()->user()->id,
                ])->load('user');            
            
            broadcast(new MessageSent($message))->toOthers();
            return $message;
            
        }catch( Exception $e ){
            Log::info($e);
        }

    }

}
