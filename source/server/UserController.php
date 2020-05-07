<?php


class UserController
{
    private $name;
    private $email;
    private $password;

    public function GetName()
    {
        return $this->name;
    } 


    public function GetEmail()
    {
        return $this->email;
    }

    public function GetPassword()
    {
        return $this->password;
    }



}


?>