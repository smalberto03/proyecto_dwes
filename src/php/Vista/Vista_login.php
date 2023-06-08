<?php
    require_once('../Controlador/C_login.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="POST"><!--../Controlador/C_login.php-->
        <label>Usuario </label> <input type="text" name="usuario"><br><br>
        <label>Contraseña</label> <input type="password" name="pass"><br><br>
        <input type="submit" name="btnlogin" value="INICIAR SESION">
    </form>
    <?php
        if(isset($_POST['btnlogin'])) //Si exite el boton y no estan nifuno de los campos vacion instaciamos la clase Controlador y realizamo el metodo
        {
            if(empty($_POST['usuario']) || empty($_POST['pass']))
            {
                echo 'Rellene todos los campos';
            }
            else{
                $obj_controlador = new Controlador_login();
                $obj_controlador->mover_a_vista_login();
            }
            
        }
    ?>
</body>
</html>