<?php
    //Comprobamos que si no se ha iniciado sesion no se pueda entrar
    session_start();

    if(isset($_GET['c'])) //Preguntamos si existe la variable c que se manda cuando se pulsa 'CERRAR SESION'
    {
       session_destroy();
       header('Location: Vista_login.php');
    }


    if(isset($_SESSION['sesion1'])) //En la vista inicio si exite la sesion qie entre y muestre lo siguiente si no que vuelva a la pagina
    {
        //echo 'HOLA';
        echo '<button><a href="Vista_inicio.php?c=1">CERRAR SESION</a></button>'; //Le pasamos un parametro para luego preguntar por el para cerrar la sesion 
        //Esto atmbien se podria hacer con un boton y preguntar si se ha pulsado
    }
    else{
        header('Location: Vista_login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <title>INICIO</title>
</head>
<body>
    <nav>
        <ol>
           <li>Inicio</li>
           <li><a href="reservas.php">Reservas</a></li> 
        </ol>
    </nav>
    <h1>HA INCIADO SESION CON EXITO: <?php echo $_SESSION['sesion1']; ?></h1>
</body>
</html>