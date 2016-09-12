<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\User;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\AddEmail' => [
            'App\Listeners\Event',
            'App\Listeners\EventOrder',

        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);
       //dd($event->user_id);
       // User::creating(function($user){
           // dd($user);
          //  mail($user->email,'Привет','Привет ты пытаешься зарегатся');
       // });
        //
    }
}
