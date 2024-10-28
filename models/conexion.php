<?php
    class conexion {
        public function conectar(){
            $conn= new PDO("mysql:host=localhost;dbname=cuarto",'root','');
            return $conn;
        }
    }
?>