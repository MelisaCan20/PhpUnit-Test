<?php
namespace App\Util;
class User
{
    private $tc;
    private $password;


    public function setTc($tc)
    {
        $this->tc = $tc;
    }

    public function getTc()
    {
        return $this->tc;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }


    public function length($len)
    {

        return strlen($len);

    }



    public function cift()
    {
        $find = (int)substr($this->getTc(), -1);
        return $find;
    }




