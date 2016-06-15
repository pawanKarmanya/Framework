<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserLoggedIn extends Event
{
    use SerializesModels;

    
    public $logIn;
    
    public function __construct( $logIn)
    {
        $this->logIn=$logIn;
    }

    
//    public function broadcastOn()
//    {
//        return [];
//    }
}
