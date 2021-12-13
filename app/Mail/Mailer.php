<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * SystemName : Task Management System
 * ModuleName : Mailer Class
 */
class Mailer extends Mailable
{
    use Queueable, SerializesModels;
    public $data, $subject, $view;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $view, $data)
    {
        $this->subject = $subject;
        $this->view = $view;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view($this->view)
                    ->subject($this->subject);
    }
}
