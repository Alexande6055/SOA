<?php
include_once '../models/acceder.php';
include_once '../models/guardar.php';
include_once '../models/borrar.php';
include_once '../models/editar.php';
include_once '../models/buscar.php';
include_once '../models/accederCursos.php';
include_once '../reportes/reporte.php';
include_once "../models/login.php";
include_once "../models/session.php";

$opc = $_SERVER['REQUEST_METHOD'];
switch ($opc) {
    case 'GET':
        if (isset($_GET['cedula'])) {
            crudBUSCAR::seleccionarEstudiantesPorCedula($_GET['cedula']);
        } else if (isset($_GET['cursos'])) {
            crudCurso::seleccionarCurso();
        }  else if(isset($_GET['reporte'])){
            Reporte::reportes();
        }else {
            crudS::seleccionarEstudiantes(); 
        }
        break;

    case 'POST':
        if (isset($_POST['login'])) {
            Login::login();
        }elseif (isset($_POST['cerrarSession'])) {
            $s= new Session();
            $s-> cerrarSession();
        }else{
            crudI::guardarEstudiante();
        }
        break;

    case 'DELETE':
        crudD::borrarEstudiante();
        break;

    case 'PUT':
        parse_str(file_get_contents("php://input"), $_PUT);
        $_REQUEST = array_merge($_REQUEST, $_PUT);
        crudU::actualizarEstudiante(); 
        break;

    default:
        echo "Método HTTP no soportado";
        break;
}
?>

