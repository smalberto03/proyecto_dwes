<?php

    require_once('../config/configdb.php'); //Requerimos de la conexion ya que ne cesitamnos conectarnos con la base de datos 

    class M_reservas{


        public $conectar; //Atributo que usamos para la conecxion

        /**
         * El constructor (Es un metodo que se realiza cada vez que se instacia esta clase). Realiza la conexion
         */
        public function __construct() 
        {
            $conexion = new Conexion();
            $this->conectar = $conexion->conectar(); 
        }

        /**
         * Metodo que hace un doble for y va insertando en un array bidimensional los datos segun si este rerservado algo o no
         * El metodo retorna todo el array 
         */
        public function crear_array_reservas(){

            for($fil=1; $fil <=6 ; $fil++) { 

                for ($col=2; $col<=6 ; $col++) {
         
                    $sql0 = "SELECT tipo FROM Reservas where dayofweek(fechaDiaReserva) = $col AND hora = $fil"; //Sacamos el tipo de la reserva para una fila(hora del dia) columna(dia de la semana)
                    $query0 = $this->conectar->query($sql0);
        
                    $tipo = $query0->fetch_array();
        
                    if($query0->num_rows == 0)//Si la consulta anterior no devuelbe filas guardamos en esa posicion del array un 'No reserva'
                    {
                        $table[$fil][$col] = 'No reserva';
                    }
                    elseif($tipo['tipo'] == 'C'){//Si el tipo devuelbe C es una reserva de un carritos y hay que introducir el carrito reservado 
         
                        $sql2= "SELECT ReservaCarritos.codigoCarrito as 'carrito' FROM ReservaCarritos INNER JOIN Reservas ON ReservaCarritos.idReservaCarrito = Reservas.idReserva
                        WHERE dayofweek(fechaDiaReserva) = $col AND hora = $fil";
        
                        $query = $this->conectar->query($sql2);
        
                        while($td = $query->fetch_array())
                        {
                            //$table[$fil][$col] = $query;
                            $table[$fil][$col] = '<span class="a">'.$td['carrito'].'</span>';
                        }
                    }
                    elseif($tipo['tipo'] == 'O')//Si el tipo devuelbe O es una reserva de un carritos y hay que introducir el ordenador reservado 
                    {
                        $sql1= "SELECT CONCAT(ReservaOrdenadores.codigoCarrito, ReservaOrdenadores.numOrdenador) as 'ordenador' FROM ReservaOrdenadores 
                        INNER JOIN Reservas ON ReservaOrdenadores.idReservaOrdenador = Reservas.idReserva WHERE dayofweek(fechaDiaReserva) = $col AND hora = $fil";
        
                        $query = $this->conectar->query($sql1);
        
                        while($td = $query->fetch_array())
                        {
                            //$table[$fil][$col] = $query;
                            $table[$fil][$col] = '<span class="v">'.$td['ordenador'].'</span>';
                        }
                    }
                }
            }

            return $table; //Cuando ya hemos ido rellenado todo el array retornamos el array completo
            
        } 

    }

?>