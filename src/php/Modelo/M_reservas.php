<?php

    require_once('../config/configdb.php');

    class M_reservas{


        public $conectar;

        public function __construct()
        {
            $conexion = new Conexion();
            $this->conectar = $conexion->conectar(); 
        }

        public function crear_array_reservas(){

            for($fil=1; $fil <=6 ; $fil++) { 

                for ($col=2; $col<=6 ; $col++) {
         
                    $sql0 = "SELECT tipo FROM Reservas where dayofweek(fechaDiaReserva) = $col AND hora = $fil";
                    $query0 = $this->conectar->query($sql0);
        
                    $tipo = $query0->fetch_array();
        
                    if($query0->num_rows == 0)
                    {
                        $table[$fil][$col] = 'No reserva';
                    }
                    elseif($tipo['tipo'] == 'C'){
         
                        $sql2= "SELECT ReservaCarritos.codigoCarrito as 'carrito' FROM ReservaCarritos INNER JOIN Reservas ON ReservaCarritos.idReservaCarrito = Reservas.idReserva
                        WHERE dayofweek(fechaDiaReserva) = $col AND hora = $fil";
        
                        $query = $this->conectar->query($sql2);
        
                        while($td = $query->fetch_array())
                        {
                            //$table[$fil][$col] = $query;
                            $table[$fil][$col] = $td['carrito'];
                        }
                    }
                    elseif($tipo['tipo'] == 'O')
                    {
                        $sql1= "SELECT CONCAT(ReservaOrdenadores.codigoCarrito, ReservaOrdenadores.numOrdenador) as 'ordenador' FROM ReservaOrdenadores 
                        INNER JOIN Reservas ON ReservaOrdenadores.idReservaOrdenador = Reservas.idReserva WHERE dayofweek(fechaDiaReserva) = $col AND hora = $fil";
        
                        $query = $this->conectar->query($sql1);
        
                        while($td = $query->fetch_array())
                        {
                            //$table[$fil][$col] = $query;
                            $table[$fil][$col] = $td['ordenador'];
                        }
                    }
                }
            }

            return $table;
            
        } 

    }

?>