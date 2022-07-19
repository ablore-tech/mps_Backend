<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\StoreChatRequest;
use App\Models\Chat;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

class ChatController extends Controller
{
    public function index(Order $order)
    {
        $chats = $order->userChats;

        return response()->json(["success" => true, "message" => $chats], 200);
    }

    public function store(StoreChatRequest $request)
    {
        $filePath = null;
        if($request->file('image'))
        {
            $image = $request->file('image');
                // Make a image name based on user name and current timestamp
                $name = Str::slug($request->input('name')) . '_' . time();
                // Define folder path
                $folder = '/uploads/images/';
                // Make a file path where image will be stored [ folder path + file name + file extension]
                $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
                // Upload image
                $this->uploadOne($image, $folder, 'public', $name);
                // Set user profile image path in database to filePath
        }

        $chat = Chat::create([
            'user_id' => $request->user()->id,
            'message' => $request->get('message') ? $request->get('message') : 'image',
            'order_id' => $request->get('order_id'),
            'image' => $filePath
        ]);

        return response()->json(["success" => true, "message" => $chat], 200); 
    }

    public function uploadOne(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename : Str::random(25);

        $file = $uploadedFile->storeAs($folder, $name . '.' . $uploadedFile->getClientOriginalExtension(), $disk);

        return $file;
    }
}
