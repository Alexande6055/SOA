<?php
include_once "session.php";
class EnlacesPaginas{
    public static function enlacesPaginasModel($enlacesModel){
        $s= new Session();
        if($enlacesModel=="nosotros"  || $enlacesModel=="contactanos"){
            $module="views/interfaces/".$enlacesModel.".php";
        }elseif ($enlacesModel=="servicios") {
            if ($s->getSession()==null) {
                $module="views/interfaces/sinAcceco.php";
            }else {
                $module="views/interfaces/servicios.php";
            }
        }else{
            if ($s->getSession()==null) {
                $module="views/interfaces/inicio.php";
            }else {
                $module="views/interfaces/okLogin.php";
            }
           
        }
        return $module;
    }
}


?>
