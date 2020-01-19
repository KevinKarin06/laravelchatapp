<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;


class ChatController extends Controller
{
    public function chat(){
        $user = User::find(Auth::id());
        return view('chat',compact('user',$user));
    }

    //    public function send(){
    //        //  return $request->all();
    //         $message= 'ok oh';
    //         $user = User::find(Auth::id());
    //         event(new ChatEvent($message,$user));
    //    }

        public function send(Request $request){
            $user = User::find(Auth::id());
            event(new ChatEvent($request->message,$user));
       }
}
