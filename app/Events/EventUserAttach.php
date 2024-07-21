<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;

class EventUserAttach implements ShouldBroadcast
{
  use Dispatchable, InteractsWithSockets, SerializesModels;

  public $attchname;
  public $filed_name;
  public $user_id;
  public $messages;
  public $order_id;
  public $employee_type;
  public $employee_id;



  public function __construct($data)
  {
      $this->messages = $data['messages'];
      $this->filed_name = $data['filed_name'];
      $this->attchname = $data['attchname'];
      $this->user_id=$data['user_id'];
      $this->employee_id = $data['employee_id'];
      $this->employee_type = $data['employee_type'];
      $this->order_id = $data['order_id'];
  }

  public function broadcastOn()
  {
      return new Channel("event-user-attach.$this->user_id");;
  }
}