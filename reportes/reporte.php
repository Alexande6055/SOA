<?php
 require('../fpdf186/fpdf.php');
 include_once '../models/conexion.php';
 class Reporte{
   public static function reportes(){
      $conn = new conexion();
      $con = $conn->conectar();
      
      $sqlSelect = "SELECT 
          estudiantes.estCedula,
          estudiantes.estNombre,
          estudiantes.estApellido,
          estudiantes.estTelefono,
          estudiantes.estDireccion,
          cursos.Nombre FROM estudiantes
          JOIN cursos ON estudiantes.curId = cursos.curId";
      
      $respuesta = $con->query($sqlSelect);
      
      $fpdf = new FPDF();
      $fpdf->AddPage();
      $fpdf->SetFont('Arial', 'B', 16);
      $fpdf->Cell(33, 10, 'Cedula', 1);
      $fpdf->Cell(33, 10, 'Nombre', 1);
      $fpdf->Cell(33, 10, 'Apellido', 1);
      $fpdf->Cell(33, 10, 'Telefono', 1);
      $fpdf->Cell(33, 10, 'Direccion', 1);
      $fpdf->Cell(33, 10, 'Curso', 1);
      $fpdf->Ln();
      
      while ($row = $respuesta->fetch(PDO::FETCH_ASSOC)) {
         $fpdf->Cell(33, 10, $row['estCedula'], 1);
         $fpdf->Cell(33, 10, $row['estNombre'], 1);
         $fpdf->Cell(33, 10, $row['estApellido'], 1);
         $fpdf->Cell(33, 10, $row['estTelefono'], 1);
         $fpdf->Cell(33, 10, $row['estDireccion'], 1);
         $fpdf->Cell(33, 10, $row['Nombre'], 1);
         $fpdf->Ln();
     }

      $fpdf->Output('D');
      
  }
  
}
?>
