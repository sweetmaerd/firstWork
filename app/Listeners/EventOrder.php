<?php

namespace App\Listeners;

use App\Events\AddEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class EventOrder
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AddEmail  $event
     * @return void
     */
    public function handle(AddEmail $event)
    {
        mail('111@111.rt','Оформлен заказ №'.$event->order_id,'Пользователь c id '.$event->user_id.$event->data.$event->order_id.'. Обработать заказ http://firstwork/home/order/'.$event->order_id);
    }
}
