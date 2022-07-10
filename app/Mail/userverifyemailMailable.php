<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class userverifyemailMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $mail_data;
  
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mail_data)
    {
        $this->mail_data = $mail_data;
      
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    { $from_name = "Daraz Email Verify";
        $from_email = "info@demotestingwebsite.com";
        $subject = "Email Verification";
        return $this->from($from_email, $from_name)
            ->view('emails.email-template')
            ->subject($subject)
        ;
        // return $this->view('view.name');
    }
}
