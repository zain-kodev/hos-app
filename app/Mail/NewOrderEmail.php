<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewOrderEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $orderData;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($orderData)
    {
        $this->orderData = $orderData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from('info@ko-design.ae', 'منصة إعمار - خدمات العملاء')
            ->subject('تم استلام طلبك بنجاح')
            ->markdown('emails.new_order')
            ->cc(['beedoosystem@gmail.com','emaar.sa@gmail.com'])
            //->attachFromStorageDisk('public',$this->dataMission['Docs'])
            ->with([
                'orderData' => $this->orderData,
            ]);
    }
}


