<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;

class MyChat implements ShouldBroadcast
{
  use Dispatchable, InteractsWithSockets, SerializesModels;

  public $from;
  public $to;
  public $message;
  public $is_read;
  public $created_at;

  public function __construct($data)
  {
      $this->from = $data['from'];
      $this->to = $data['to'];
      $this->message = $data['message'];
      $this->is_read = $data['is_read'];
      $this->created_at = $data['created_at'];
  }

  public function broadcastOn()
  {
      return new Channel("my-chat");
  }
}