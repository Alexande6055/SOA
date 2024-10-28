<?php
  class Session{
    public function __construct(){
        session_start(); 
    }
    public function setSession($user){
        $_SESSION['user']=$user;

    }

    public function getSession(){
       return isset($_SESSION['user']) ? $_SESSION['user'] : null;
 
    }
    public function cerrarSession(){
        session_unset();
        session_destroy();
        echo json_encode(['success' => true]);
    }
  }

?>