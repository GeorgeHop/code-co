<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LiveChatMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var string Content of chat message
     */
    public $message;

    /**
     * @var string|int ID of user who is in live chat room or session ID if user not logged in
     */
    private $authenticator;

    /**
     * Create a new event instance.
     *
     * @param  string|int  $authenticator
     * @param  string  $message
     */
    public function __construct($authenticator, string $message) {
        $this->message = $message;
        $this->authenticator = $authenticator;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn() {
        $channel = (is_numeric($this->authenticator)) ? PrivateChannel::class : Channel::class;
        return new $channel('live-chat.' . $this->authenticator);
    }
}
