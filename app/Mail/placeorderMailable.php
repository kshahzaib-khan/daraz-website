<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class placeorderMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $order_data;
    public $item_in_cart;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order_data,$item_in_cart)
    {
        $this->order_data = $order_data;
        $this->item_in_cart = $item_in_cart;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    { $from_name = "Daraz";
        $from_email = "info@demotestingwebsite.com";
        $subject = "Daraz: You have a new query";
        return $this->from($from_email, $from_name)
            ->view('emails.order')
            ->subject($subject)
        ;
        // return $this->view('view.name');
    }
}
