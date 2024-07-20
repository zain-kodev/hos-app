<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RQsEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $Order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($Order)
    {
        $this->Order = $Order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.rqs')
            ->with([
                'Bennar' => $this->Order["Bennar"],
                'Bank' => $this->Order["Bank"],
                'FileCode' => $this->Order["FileCode"],
                'DRP' => $this->Order["DRP"],
                'Name' => $this->Order["Name"],
                'Email' => $this->Order["Email"],
                'City' => $this->Order["City"],
                'Phone' => $this->Order["Phone"],
                'RQS' => $this->Order["RQS"],
                'SOA' => $this->Order["SOA"],
                'total' => $this->Order["total"],
                'currency' => $this->Order["currency"],
            ])->from('support@ko-design.ae', 'الإدارة المالية - منصة إعمار')
            ->subject('سند استلام المبلغ')
            ->cc(['beedoosystem@gmail.com']);
    }
}
