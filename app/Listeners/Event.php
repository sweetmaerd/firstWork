<?php

namespace App\Listeners;

use App\Events\AddEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class Event
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  addEmail  $event
     * @return void
     */
    public function handle(AddEmail $event)
    {
       //
    }
}
