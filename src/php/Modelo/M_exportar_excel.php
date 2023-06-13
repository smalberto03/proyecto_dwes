<?php
    //FALTA COMENTARIOS
    //require('../../vendor/autoload.php');
    //use PhpOffice\PhpSpreadsheet\IOFactory;
    require('../config/configdb.php');

    class M_exportar_excel {

        
        public $conectar;
        public function __construct()
        {
            $conexion = new Conexion();
            $this->conectar = $conexion->conectar(); 
        }

        public function importar_excel($campo1, $campo2, $campo3)
        {
            $insert = "INSERT INTO Alumnos (idAlumno, nombre, apellido) VALUES ('$campo1', '$campo2', '$campo3')";
            $query = $this->conectar->query($insert);

            return 'Ya se ha insertado';

        }

    }
        
?>