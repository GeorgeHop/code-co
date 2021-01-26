<?php

namespace App\Http\Controllers;

use App\Events\LiveChatMessage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LiveChatController
{
    public function send(Request $request): JsonResponse {
        $data = $this->validateMessage($request);
        LiveChatMessage::dispatch($data['authenticator'], $data['message']);
        return response()->json();
    }

    private function validateMessage(Request $request): array {
        return $request->validate([
            'message' => ['required', 'max: 5000'],
            'authenticator' => ['required'],
        ]);
    }
}
