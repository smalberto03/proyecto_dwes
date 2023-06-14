<?php 
    require_once('../Controlador/C_reservas.php'); 

    $table = array();

    $objeto_controlador = new C_reservas();
    $table = $objeto_controlador->insertar_td();

    session_start();

    if(!isset($_SESSION['sesion1']))
    {
        header('Location: Vista_login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Reservas</title>
</head>
<body>
    <nav>
        <ol>
           <li><a href="Vista_inicio.php">Inicio</a></li>
           <li>Reservas</li> 
        </ol>
    </nav>
    <h1>Tabla de reservas</h1>
    <table>
        <tr>
            <td> </td>
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miercoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
        </tr>
        <tr>
            <th>1ª</th>
            <td><?php echo $table[1][2]; ?></td>
            <td><?php echo $table[1][3]; ?></td>
            <td><?php echo $table[1][4]; ?></td>
            <td><?php echo $table[1][5]; ?></td>
            <td><?php echo $table[1][6]; ?></td>
        </tr>
        <tr>
            <th>2ª</th>
            <td><?php echo $table[2][2]; ?></td>
            <td><?php echo $table[2][3]; ?></td>
            <td><?php echo $table[2][4]; ?></td>
            <td><?php echo $table[2][5]; ?></td>
            <td><?php echo $table[2][6]; ?></td> 
        </tr>
        <tr>
            <th>3ª</th>
            <td><?php echo $table[3][2]; ?></td>
            <td><?php echo $table[3][3]; ?></td>
            <td><?php echo $table[3][4]; ?></td>
            <td><?php echo $table[3][5]; ?></td>
            <td><?php echo $table[3][6]; ?></td> 
        </tr>
        <tr>
            <th>4ª</th>
            <td><?php echo $table[4][2]; ?></td>
            <td><?php if(isset($table[4][3])){echo $table[4][3];} ?></td>
            <td><?php echo $table[4][4]; ?></td>
            <td><?php echo $table[4][5]; ?></td>
            <td><?php echo $table[4][6]; ?></td> 
        </tr>
        <tr>
            <th>5ª</th>
            <td><?php echo $table[5][2]; ?></td>
            <td><?php echo $table[5][3]; ?></td>
            <td><?php echo $table[5][4]; ?></td>
            <td><?php echo $table[5][5]; ?></td>
            <td><?php echo $table[5][6]; ?></td> 
        </tr>
        <tr>
            <th>6ª</th>
            <td><?php echo $table[6][2]; ?></td>
            <td><?php echo $table[6][3]; ?></td>
            <td><?php echo $table[6][4]; ?></td>
            <td><?php echo $table[6][5]; ?></td>
            <td><?php echo $table[6][6]; ?></td> 
        </tr>
    </table>
</body>
</html>