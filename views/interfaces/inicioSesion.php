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
        <title>Login</title>
    <link rel="stylesheet" href="css/estilosLogin.css">

    </head>
    <body>
    <div class="login">
        <h2>Login</h2>
        <form id="loginForm" method="POST">
            <label for="user">Usuario</label>
            <input type="text" name='user' id="user" required>
            <br>
            <label for="pass">Contraseña</label>
            <input type="password" name='pass' id="pass" required>
            <br>
            <button type="submit">Ingresar</button>
            <br><br>
            <div id="alert-message" style="color: red;"></div>
        </form>
    </div>


    <script>
    document.getElementById('loginForm').addEventListener('submit', function(event) {
        event.preventDefault();
        verficar();
    });

    function verficar() {
        $.ajax({
            url: 'http://localhost/cuarto/controllers/apiRest.php?cerrarSession=true',
            type: 'POST',
            data: $('#loginForm').serialize() + '&login=true',
            dataType: 'json', 
            success: function(data) {
                if (data.success) {
                    location.reload();
                } else {
                    document.getElementById("alert-message").innerText = data.message;
                }
            }
        });
    }
    </script>
    </body>
    </html>
