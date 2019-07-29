<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewsLetter extends Mailable
{
    use Queueable, SerializesModels;

    private $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->message = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $message = $this->message;
        // $msg = $message['message'];
        return $this->subject($message['subject'])->view('emails.newsletter')->with([
            'ahic_message' => $message['message']
        ]);
    }
}
