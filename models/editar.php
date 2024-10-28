<?php
include_once 'conexion.php';
class crudU{
    public static function actualizarEstudiante(){
        $conn = new Conexion();
        $con = $conn->conectar();
        $cedula=$_REQUEST['cedula'];
        $nombre=$_REQUEST['estNombre'];
        $apellido=$_REQUEST['estApellido'];
        $direccion=$_REQUEST['estDireccion'];
        $telefono=$_REQUEST['estTelefono'];
        $curId=$_REQUEST['curId'];
        $sqlEditar="UPDATE estudiantes
                    SET estNombre='$nombre', estApellido='$apellido',
                    estDireccion='$direccion', estTelefono='$telefono',
                    curId='$curId' WHERE estCedula='$cedula'";

        if ($con->query($sqlEditar)==TRUE) {
            echo  json_encode ("Se edito");
        }else{
            echo json_encode("Fallo".$sqlEditar.$mysql->error);
        }
            }
        }
?>

