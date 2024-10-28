
<?php
 include_once 'conexion.php';
 include_once 'session.php';
    class login{
        public static function login() {
            $objetoconexion= new conexion();
            $conn= $objetoconexion->conectar();
            $pass=$_POST['pass'];
            $user=$_POST['user'];
            $sql= "SELECT * 
                    FROM users
                    WHERE user= '$user' AND pass= '$pass'";
            $result= $conn-> prepare($sql);
            $result -> execute();
            $data=$result->fetchAll(PDO::FETCH_ASSOC);
            if (count($data)>0) {
                $session = new Session();
                $session->setSession("admin");
                echo json_encode(['success' => true]);

            }else {
                echo json_encode(['success' => false, 'message' => 'Usuario o contraseña incorrectos']);
#                return false;
            }

        }
    }
?>