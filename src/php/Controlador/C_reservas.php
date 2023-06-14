<?php

    require_once('../Modelo/M_reservas.php');

    class C_reservas {

        public $view;

        public function insertar_td(){

            $table = array();

            $objeto_modelo = new M_reservas();
            $table = $objeto_modelo->crear_array_reservas();
            
            //$this->view = '../Vista/reservas.php';

            //requiere_once($this->view);

      
            
            return $table;
                     

            // for($fil=1; $fil <=6 ; $fil++)
            // {

            //     // echo '<tr>';
            //     // echo '<td>'.$fil.'ª</td>';

            //     for ($col=2; $col<=6 ; $col++){
            //         if(isset($table[$fil][$col]))
            //         {
            //             // echo '<td>'.$table[$fil][$col].'</td>';
            //             return $table[$fil][$col];
            //         }
                    
            //     }

            //     //echo '</tr>';
            // }

            

        }


    }
    
?>
