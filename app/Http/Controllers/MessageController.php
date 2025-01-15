<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function fetchMessages()
    {
        $messages = Message::where('is_read', false)->latest()->get();
        return response()->json($messages);
    }

    public function markAsRead($id)
    {
        $message = Message::findOrFail($id);
        $message->is_read = true;
        $message->save();

        return response()->json(['status' => 'success']);
    }
    public function getMessages()
    {
    $message = Message::where('read', false)->latest()->take(5)->get();
    return response()->json($message);
    }

}


