<?php
class MvcController{
    public function plantilla(){
        include "views/plantilla.php";
    }

    public function verificacionLogeo(){
        if (empty($_SESSION['user'])) {
            include "views/interfaces/inicioSesion.php";
           
        }else {
            include "views/interfaces/okLogin.php";
        }
    }
public function enlacesPaginasController(){
    if(isset($_GET["action"])){
        $enlacesController=$_GET["action"];
    }else{
        $enlacesController="inicio.php";
    }
    $respuesta=EnlacesPaginas::enlacesPaginasModel($enlacesController);
    include $respuesta;
}
}
?>

