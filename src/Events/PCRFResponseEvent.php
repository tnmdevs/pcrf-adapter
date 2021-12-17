<?php

namespace TNM\PCRF\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use TNM\PCRF\Responses\PCRFResponse;

class PCRFResponseEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public array $attributes;
    public PCRFResponse $response;

    public function __construct(array $attributes, PCRFResponse $response)
    {
        $this->attributes = $attributes;
        $this->response = $response;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
