<?php

class User extends DB{

    private $Name;
    private $UserName;

    public function userExist($UserName, $password){
        $md5password = md5($password);

        $query = $this->connect()->prepare('SELECT * FROM admins WHERE NombreUsuario= :UserName AND password=:Password');
        $query->execute(['UserName' => $UserName, $password => 'password']);

        if ($query->rowCount()) {
            return true;
        }else{
            return false;
        }

    }

    public function setUser($UserName){
            
    }


     }

?>