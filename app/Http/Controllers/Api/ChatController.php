<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\StoreChatRequest;
use App\Models\Chat;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index(Order $order)
    {
        $chats = $order->userChats;

        return response()->json(["success" => true, "message" => $chats], 200);
    }

    public function store(StoreChatRequest $request)
    {
        $chat = Chat::create([
            'user_id' => $request->user()->id,
            'message' => $request->get('message'),
            'order_id' => $request->get('order_id')
        ]);

        return response()->json(["success" => true, "message" => $chat], 200); 
    }
}
