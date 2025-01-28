<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class HomeUpdated implements ShouldBroadcast
{
    use Dispatchable, SerializesModels;

    public function __construct() {}

    public function broadcastOn()
    {
        return new Channel('home-updates');
    }

    public function broadcastAs()
    {
        return 'home.updated';
    }
}

