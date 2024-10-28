<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="jquery-easyui-1.10.19/themes/black/easyui.css">
    <link rel="stylesheet" type="text/css" href="jquery-easyui-1.10.19/themes/icon.css">
    <script type="text/javascript" src="jquery-easyui-1.10.19/jquery.min.js"></script>
    <script type="text/javascript" src="jquery-easyui-1.10.19/jquery.easyui.min.js"></script>
    <link rel="stylesheet" type="text/css" href="jquery-easyui-1.10.19/themes/color.css">
    <link rel="stylesheet" type="text/css" href="jquery-easyui-1.10.19/demo/demo.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
 <link rel="stylesheet" href="css/estilosok.css">

    <title>Acceso Denegado</title>
</head>
<body>
<div class="message">
        <h1>¡Has ingresado como Administrador!</h1>
        <button onclick="cerrarSecion()">Salir</button>
    </div>

    <script>
        
        function cerrarSecion(){
            $.ajax({
                url: 'http://localhost/cuarto/controllers/apiRest.php?cerrarSession=true',
                type:'POST',
                dataType: 'json',
                data: { cerrarSession: true }, 
                success: function(data){
                    if(data.success){
                        location.reload();
                    }

                }
            });
        }

    </script>
</body>
</html>
