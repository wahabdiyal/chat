<?php

namespace App\Http\Controllers;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use App\Events\MessageSent;
class ChatsController extends Controller
{
    public function index()
{
  return view('chat')->with('users',User::where('id','!=',session('user')->id)->get());
}

/**
 * Fetch all messages
 *
 * @return Message
 */
public function fetchMessages()
{
  return Message::with('user')->get();
}

/**
 * Persist message to database
 *
 * @param  Request $request
 * @return Response
 */
public function sendMessage(Request $request)
{
	 
  $user = User::find($request->user);
if (!$user) {
	 return ['error'=>'user not found'];
}
  $message = $user->messages()->create([
    'message' => $request->input('message')
  ]);
 broadcast(new MessageSent($user, $message))->toOthers();
  return ['status' => 'Message Sent!'];
}

public function messagebox()
{
	return view('layouts.message')->with('users',User::where('id','!=',session('user')->id)->get());
}



}
