<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OlvidarPassword extends Mailable{
    use Queueable, SerializesModels;

    public $usuario;
    public $random_pass;

    public function __construct($usuario, $random_pass)
    {
        $this->$usuario= $usuario;
        $this->random_pass = $random_pass;
    }

    public function build()
    {
        return $this->markdown('emails.olvidar_password')->subject(config('app.name').
         ', Olvidar Password');
    }
    

}