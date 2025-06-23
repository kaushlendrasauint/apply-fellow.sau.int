<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentSuccessfulMail extends Mailable
{
    use Queueable, SerializesModels;

    public $paymentDetails;

    /**
     * Create a new message instance.
     */
    public function __construct($paymentDetails)
    {
        $this->paymentDetails = $paymentDetails;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Payment Successful')
                    ->view('emails.payment_successful')
                    ->with('details', $this->paymentDetails);
    }
}
