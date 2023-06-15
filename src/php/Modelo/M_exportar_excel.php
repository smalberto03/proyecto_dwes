<?php
    //require('../../vendor/autoload.php');
    //use PhpOffice\PhpSpreadsheet\IOFactory;
    require('../config/configdb.php'); //Requerimos ek config para 

    class M_exportar_excel {

        
        public $conectar;
        public function __construct()//El metodo de conectar con la base de datos que que se realiza siempre al instaciar la clase
        {
            $conexion = new Conexion();
            $this->conectar = $conexion->conectar(); 
        }

        /**
         * Este metodo inserta filas en la base de datos en la tabla Alumnos 
         * @param $campo1 int Es el id del alumno
         * @param $campo2 string Es el nombre del alumno
         * @param $campo3 string Es el apellido del alumno
         * Retorna un mensaje de confirmacion
         */
        public function importar_excel($campo1, $campo2, $campo3)
        {
            $insert = "INSERT INTO Alumnos (idAlumno, nombre, apellido) VALUES ('$campo1', '$campo2', '$campo3')";
            $query = $this->conectar->query($insert);

            return 'Ya se ha insertado';

        }

    }
        
?>