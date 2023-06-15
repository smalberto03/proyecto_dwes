<?php

    require_once('../Modelo/M_reservas.php'); //Requerimos del modelo ya que vamos a usar sus metodos 

    class C_reservas {

        public $view;

        /**
         * Este metodo instacia el Modelo y realiza el metodo de rellenar el array y volvemos a retornar el array que usaremos en la vista
         */
        public function insertar_td(){

            $table = array();

            $objeto_modelo = new M_reservas(); //Instaciamos la clase 
            $table = $objeto_modelo->crear_array_reservas();//Con el objeto realizamos el metodo. Ahora en $table tenemos el array que devuelbe el metodo del modelo
            
            //$this->view = '../Vista/reservas.php';

            //requiere_once($this->view);

      
            
            return $table; //Retornamos el array
                     

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
