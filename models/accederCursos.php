<?php
include_once "conexion.php";
class crudCurso{
    public static function seleccionarCurso(){
        $sqlCursos = "SELECT curId, Nombre FROM cursos";
        $objetoconexion= new conexion();
        $conn= $objetoconexion->conectar();
        $result=$conn->prepare($sqlCursos);
        $result->execute();
        $data= $result->fetchAll(PDO::FETCH_ASSOC);
        $dataJson=json_encode($data);
        echo ($dataJson); 
    }
}
?>
