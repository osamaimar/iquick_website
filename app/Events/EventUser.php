<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;

class EventUser implements ShouldBroadcast
{
  use Dispatchable, InteractsWithSockets, SerializesModels;

  public $status;
  public $username;
  public $order_code;
  public $user_id;
  public $messages;
  public $order_id;
  public $employee_type;


  public function __construct($data)
  {
      $statuslang=$data['status'];
      $this->messages = $data['messages'];
      $this->order_code = $data['order_code'];
      $this->username = $data['username'];
      $this->order_id = $data['order_id'];
      $this->employee_type = $data['employee_type'];
      $this->status = __("admin.$statuslang");
      $this->user_id=$data['user_id'];
  }

  public function broadcastOn()
  {
      return new Channel("event-user.$this->user_id");;
  }
}