<?php

namespace App\Classes;

class User
{
    private string $idUser;
    private string $emailUser;

    function __construct($idUser,$emailUser) {
        $this->idUser = $idUser;
        $this->emailUser = $emailUser;
    }

    public function getIdUser(){
        return $this->idUser;
    }

    public function getEmailUser(){
        return $this->emailUser;
    }

    public function setIdUser($idUser){
        $this->idUser = $idUser;
    }

    public function setEmailUser($emailUser){
        $this->emailUser = $emailUser;
    }
}
