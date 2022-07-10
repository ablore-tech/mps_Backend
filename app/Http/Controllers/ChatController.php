<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Order;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index(Order $order)
    {
        $chats = $order->userChats ? $order->userChats : null;

        return view('chats.index', compact(['chats', 'order']));
    }

    public function store(Request $request, Order $order)
    {
        $chat = Chat::create([
            'admin_id' => $request->user()->id,
            'message' => $request->get('message'),
            'order_id' => $order->id
        ]);

        return back(); 
    }
}
