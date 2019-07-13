<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class homespaceMail extends Mailable
{
    use Queueable, SerializesModels;
    public $view , $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$view)
    {
        $this->view = $view;
        $this->data = $data;
        $this->subject = $data->subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view($this->view);
    }
}
