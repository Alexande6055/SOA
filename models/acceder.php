<?php
include_once "conexion.php";
class crudS{
    public static function seleccionarEstudiantes(){
        $sqlSelect = "SELECT 
        estudiantes.estCedula,
        estudiantes.estNombre,
        estudiantes.estApellido,
        estudiantes.estTelefono,
        estudiantes.estDireccion,
        cursos.Nombre 
        FROM estudiantes
        JOIN cursos ON estudiantes.curId = cursos.curId";
        $objetoconexion= new conexion();
        $conn= $objetoconexion->conectar();
        $result=$conn->prepare($sqlSelect);
        $result->execute();
        $data= $result->fetchAll(PDO::FETCH_ASSOC);
        $dataJson=json_encode($data);
        echo ($dataJson); 
    }
}
?>
