<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
class DetailsSaved
{
    
    
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserLoggedIn  $event
     * @return void
     */
    public function handle(UserLoggedIn $event)
    {
        $Text="UserName: ".$event->logIn."| Logged In At:".Carbon::now()."\n";
        File::prepend('userlog',$Text);
    }
}
