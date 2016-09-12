<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class AddEmail extends Event
{
    use SerializesModels;
    public $user_id;
    public $data;
    public $order_id;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user_id, $data, $order_id=null)
    {
        $this->user_id = $user_id;
        $this->data = $data;
        $this->order_id = $order_id['id'];
       // dd($this->user_id,$this->data,$this->order_id);

    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
