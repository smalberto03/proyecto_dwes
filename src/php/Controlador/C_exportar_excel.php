<?php
    //FALTA COMENTARIOS
    require_once('../Modelo/M_exportar_excel.php');
    require '../../../vendor/autoload.php';
    use PhpOffice\PhpSpreadsheet\IOFactory;

    class C_exportar_excel {

        /**
         * Leemos el excel y duardamos los campos que vamos a insertar en variables
         * Esta variable se mandan cuando realizamos el metodo de insertar en la base de datos del modelo 
         */
        public function leer_excel()
        {
        
            $archivo = '../../../vendor/alumnos.xlsx';
            $documento = IOFactory::load($archivo);

            $hojafilas = $documento->getSheet(0); //La funcion seleccion la hojan del excel que queremos usar como solo tenemos 1 ponemos 0
            $numerofilas = $hojafilas->getHighestDataRow(); //Funcoj que devuelbe un entero con las filas qie hay 
            $campos = $hojafilas->getHighestColumn(); //Devuelbe el numero de campos (columnas)

            //Vamos a recorrer las filas y columnas mediante for
            for($indicerow = 1; $indicerow <= $numerofilas; $indicerow++)
            {
                // for($indicecolumn = 1; $indicecolumn <= $campos; $indicecolumn++)
                // {
                //     $celda = $hojafilas->getCellByColumnAndRow($indicecolumn, $indicerow);
                //     echo $celda;

                // }

                $campo1 = $hojafilas->getCellByColumnAndRow(1,$indicerow);
                $campo2 = $hojafilas->getCellByColumnAndRow(2,$indicerow);
                $campo3 = $hojafilas->getCellByColumnAndRow(3,$indicerow);

                $objeto_modelo = new M_exportar_excel();
                $insert = $objeto_modelo->importar_excel($campo1, $campo2, $campo3);

                require_once('../Vista/Vista_excel.php');
                //ESTOS ECHO HAY QUE QUITARLOS DEL CONTROLADOR
                //echo $campo1.' '.$campo2.' '.$campo3.'<br>';
                echo '<br>';
            }

            //require_once('../Vista/Vista_excel.php');
            echo $insert;

        }


    }


?>