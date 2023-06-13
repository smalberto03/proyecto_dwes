<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excel</title>
</head>
<body>
    <?php
    //FALTA COMENTARIOS
        require_once('../Controlador/C_exportar_excel.php');

        $objcontrolador = new C_exportar_excel();
        $filas = $objcontrolador->leer_excel();

        //echo $campo1.' '.$campo2.' '.$campo3.'<br>';
    ?>
</body>
</html>