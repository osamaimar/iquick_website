<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;

class MyEvent implements ShouldBroadcast
{
  use Dispatchable, InteractsWithSockets, SerializesModels;

  public $type_order;
  public $username;
  public $order_code;
  public $messages;
  public $order_id;
  public $employee_type;
  public $employee_id;

  public function __construct($data)
  {
      $this->messages = $data['messages'];
      $this->order_code = $data['order_code'];
      $this->username = $data['username'];
      $this->order_id = $data['order_id'];
      $this->type_order = $data['type_order'];
      $this->employee_type = $data['employee_type'];
      $this->employee_id = $data['employee_id'];
  }

  public function broadcastOn()
  {
      return new Channel("my-channel");;
  }
}