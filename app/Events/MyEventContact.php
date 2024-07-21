<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;

class MyEventContact implements ShouldBroadcast
{
  use Dispatchable, InteractsWithSockets, SerializesModels;

  public $message;
  public $username;
  public $email;

  public function __construct($data)
  {
      $this->email = $data['email'];
      $this->username = $data['username'];
      $this->message = $data['message'];
  }

  public function broadcastOn()
  {
      return new Channel("my-contact");;
  }
}