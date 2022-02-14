<?php

namespace App\Classes;
use App\Interfaces\MailerProvider;

class SmtpProvider implements MailerProvider
{
    //
    public function send($email,$message){
        return true;
    }
}
