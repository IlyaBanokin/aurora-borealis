<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendContacts extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $email;
    protected $text;

    public $subject = 'Обратная форма связи с сайта';

    /**
     * SendContacts constructor.
     * @param $email
     * @param $name
     * @param $text
     */
    public function __construct($name, $email, $text)
    {
        $this->name = $name;
        $this->email = $email;
        $this->text = $text;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view(env('THEME') . '.shop.contacts.email', ['name' => $this->name, 'email' => $this->email, 'text' => $this->text]);
    }
}
