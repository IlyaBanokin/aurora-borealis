<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ShopOrder extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $phone;
    protected $text;

    public $subject = 'Новый заказ с сайта';

    /**
     * ShopOrder constructor.
     * @param $name
     * @param $phone
     * @param $text
     */
    public function __construct($name, $phone, $text)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->text = $text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view(env('THEME') . '.shop.cart.order_email', ['name' => $this->name, 'phone' => $this->phone, 'text' => $this->text]);
    }
}
