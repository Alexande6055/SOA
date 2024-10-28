<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap CRUD Data Table for Database with Modal Form</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<br>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>lista estudiantes</h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#look" class="btn btn-info" data-toggle="modal"><i
                                class="material-icons">&#xE15C;</i> <span>Buscar</span></a>

                          <a href="#reporte" class="btn btn-info" data-toggle="modal" onclick="reporteGeneral()"><i
                                class="material-icons">&#xE15C;</i> <span>Reporte</span></a>
                          </div>
                </div>
            </div>
            <br>
            <table class="table table-striped table-hover" >
                <thead>
                    <tr>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Curso</th>
                    </tr>
                </thead>
                <tbody id="studentTableBody">
                </tbody>
            </table>
            
        </div>
    </div>
  

 <!-- look Modal HTML -->
 <div id="look" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="lookForm">
                <div class="modal-header">
                    <h4 class="modal-title">buscar estudiante</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Cedula</label>
                        <input type="text" class="form-control" name="cedula" required > 
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" value="buscar" >
                </div>
            </form>
        </div>
    </div>
</div>

  

    <script>
        $(document).ready(function () {
            fetchStudents();
            function fetchStudents() {
            $.ajax({
            url: "http://localhost/cuarto/controllers/apiRest.php",
            type: 'GET',
            success: function (response) {
                try {
                    var students = JSON.parse(response);
                    var tableBody = $('#studentTableBody');
                    tableBody.empty();
                    students.forEach(function (student) {
                        var row = `<tr>
                        
                            <td>${student.estCedula}</td>
                            <td>${student.estNombre}</td>
                            <td>${student.estApellido}</td>
                            <td>${student.estDireccion}</td>
                            <td>${student.estTelefono}</td>
                            <td>${student.Nombre}</td>
                        </tr>`;
                        tableBody.append(row);
                    });
                } catch (e) {
                    console.error("Error al analizar JSON:", e);
                }
            },
            error: function (xhr, status, error) {
                console.error("Error AJAX:", status, error);
            }
        });
    }
        });
$('#lookForm').on('submit', function (e) {
    e.preventDefault();
    
    var cedula = $(this).find('input[name="cedula"]').val(); // Get the cedula from the input

    $.ajax({
        url: "http://localhost/cuarto/controllers/apiRest.php?cedula=" + cedula,
        type: 'GET',
        success: function (response) {
                try {
                    var students = JSON.parse(response);
                    var tableBody = $('#studentTableBody');
                    tableBody.empty();
                    students.forEach(function (student) {
                        if (student) {
                        var row = `<tr>
                        
                            <td>${student.estCedula}</td>
                            <td>${student.estNombre}</td>
                            <td>${student.estApellido}</td>
                            <td>${student.estDireccion}</td>
                            <td>${student.estTelefono}</td>
                            <td>${student.Nombre}</td>
                        </tr>`;

                        tableBody.append(row);
                        $('#look').modal('hide');
                } else {
                    alert("No se encontró el estudiante.");
                }
                    });
                } catch (e) {
                    console.error("Error al analizar JSON:", e);
                }
            },
        error: function (xhr, status, error) {
            console.error("Error AJAX:", status, error);
            alert("No se encontró el estudiante.");
        }
    });
});
function reporteGeneral(){
    window.location.href = 'http://localhost/cuarto/controllers/apiRest.php?reporte=true';
    }
    </script>
</body>

</html>