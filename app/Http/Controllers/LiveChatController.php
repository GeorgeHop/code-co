<?php

namespace App\Http\Controllers;

use App\Events\LiveChatMessage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LiveChatController
{
    public function send(Request $request): JsonResponse {
        LiveChatMessage::dispatch($this->validateMessage($request)['message']);
        return response()->json();
    }

    private function validateMessage(Request $request): array {
        return $request->validate([
            'message' => ['required', 'max: 5000'],
        ]);
    }
}
