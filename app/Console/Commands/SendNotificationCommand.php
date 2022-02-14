<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use App\Classes\SesProvider;
use App\Classes\User;
use App\Classes\NotificationService;
use Illuminate\Http\JsonResponse;

class SendNotificationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:send_notification {id}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para enviar notificaciones a un usuario';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $id = $this->argument("id");

        $email= (Str::random($length = 10)) . '@hotmail.com';
        $user = new User($id,$email);
        $sesProv = new SesProvider();
        $notifServ = new NotificationService($sesProv);

        $message = Str::random($length = 40);
        
        $jsonresponse = Response()->json(["Id" => $user->getIdUser(),
                                            "Email" => $user->getEmailUser(),
                                            "Message" => $message,
                                            "Result" => $notifServ->notify($user,$message)]);

        $this->info($jsonresponse->getContent());

        return 0;
    }
}
