<?php
    require_once('../config/configdb.php');

    class Modelo_login{

        public $conectar;
        public function __construct()
        {
            $conexion = new Conexion();
            $this->conectar = $conexion->conectar(); 
        }


        public function validarLogin($usuario, $pass)
        {
            // $conexion = new Conexion();
            // $conectar = $conexion->conectar(); 

            // $servidor = 'localhost';
            // $user='root';
            // $password='';
            // $bbdd='login';

            // $conexion = new mysqli($servidor, $user, $password, $bbdd);


            // echo $usuario;
            // echo $pass;

            // Voy a usar consultas preparadas ya que los datos de usuario y contraseña
            // se introduciran por teclado y así evitamos inyeccion sql y es más seguro

            //$this->conectar $conectar          
            $prepare = $this->conectar->prepare("SELECT * from usuario WHERE usuario = ? AND pass = ?"); //En la consulta coasundo usamos prepare en campos que van a aprecer de un formulario usamos '?' luego le decimos que tipo de dato es 
            

            $prepare->bind_param('ss', $parametro1, $parametro2); // Con bind_param() debemos decirle que tipo de dato son los '?' de la consulta en este caso dos strings y denominamos a los campos
           
            //echo $parametro1;

            $parametro1 = $usuario;
            $parametro2 = sha1($pass); //$pass

            $prepare->execute(); //Esto termina el proceso de prepare

            //Ahora le preguntamos mediante un whiel y la funcion fecth_array si devuelbe filas. Si lo hace es porque el usuario y pass son correctos 
            //entonces devolvemos un valor y se acaba el metodo, si no devolvemos otro valor
            while($prepare->fetch())
            {
                return 1;
            }
           
            return 0;
            
        }
    }

?>