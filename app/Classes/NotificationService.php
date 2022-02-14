<?php

namespace App\Classes;

use App\Interfaces\MailerProvider;

class NotificationService
{
    private MailerProvider $mailProvider; 

    public function __construct($mailProvider)
    {
       $this->mailProvider = $mailProvider; 
    }

    public function getMailProvider(){
        return $this->mailProvider;
    }

    public function setMailProvider($mailProvider){
        $this->mailProvider = $mailProvider; 
    }

    public function notify($user, $message){
        return $this->mailProvider->send($user->getEmailUser(),$message);
    }
}
