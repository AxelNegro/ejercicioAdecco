<?php

namespace App\Interfaces;

interface MailerProvider{
    public function send($email,$message);
}