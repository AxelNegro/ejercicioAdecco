<?php

namespace App\Http\Controllers;

use App\Classes\NotificationService;
use App\Classes\SmtpProvider;
use App\Classes\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function sendNotification($id){
        $email= (Str::random($length = 10)) . '@hotmail.com';
        $user = new User($id,$email);
        $smtpProv = new SmtpProvider();
        $notifServ = new NotificationService($smtpProv);

        $message = Str::random($length = 40);

        return response()->json(["Id" => $user->getIdUser(),
                                "Email" => $user->getEmailUser(),
                                "Message" => $message,
                                "Result" => $notifServ->notify($user,$message)]);
    }
}
