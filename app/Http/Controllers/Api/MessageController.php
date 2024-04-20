<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(MessageRequest $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|integer',
            'message' => 'required|string'
        ]);

        $storeMessage = Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);

        if($storeMessage) return ApiResponse::success(201,'send successfully',[]);
    }
}
