<?php

class pegawai {
    public function login($username,$password){
        $app = new database;
        $pegawai = $app->get("select * from pegawai where username = '$username' and password = '$password'");
        if($pegawai != null){
            $_SESSION['login'] = "true";
            $_SESSION['user'] = $pegawai;
            return true;
        }else{
            $_SESSION['login'] = "false";
            return false;
        }
    }
}
?>