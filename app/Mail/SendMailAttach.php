<?php

namespace App\Mail;

use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Storage;
class SendMailAttach extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new data instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(Setting::first()->mail_from_address)->attach(Storage::disk()->path('images/contacts/attachments/'.$this->data->file))
                    ->view('emails.SendMail');
    }
}
