
<?php
 include_once 'conexion.php';
    class crudI{
        public static function guardarEstudiante() {
            $objetoconexion= new conexion();
            $conn= $objetoconexion->conectar();
            $cedula=$_POST['estCedula'];
            $nombre=$_POST['estNombre'];
            $apellido=$_POST['estApellido'];
            $direccion=$_POST['estDireccion'];
            $telefono=$_POST['estTelefono'];
            $curId=$_REQUEST['curId'];
            $guardarestudiante= "INSERT INTO estudiantes VALUES('$cedula','$nombre','$apellido','$telefono','$direccion','$curId') ";
            $result=$conn->prepare($guardarestudiante);
            $result->execute();
            print_r("se guardo correctamente ");
        }
    }
?>