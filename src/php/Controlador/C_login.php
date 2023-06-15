<?php
    //Usuario: albero // 123

    require_once('../Modelo/M_login.php');

    class Controlador_login{

        public $vista;

        public function mover_a_vista_login($usuario, $contrasenia) //Este metodo insracianun objeto de la clase MOdelo realiza el nmetodo y observa que devuelbe y depende de eso llama a una vista o a otra
        {
            //if(isset($boton))
            //{
                if(empty($usuario) || empty($contrasenia))
                {
                    return '<br><span class="mensaje">Rellene todos los campos</span>';
                }
                else{

                    $objeto_modelo = new Modelo_login();

                    //if(isset($_POST['btnlogin'])) //Si se ha pulsado el boton acepatr de el formulario de inicio de sesion 
                    //{
                    // echo $_POST['usuario'];
                    // echo $_POST['pass'];

                    $metodo = $objeto_modelo->validarLogin($_POST['usuario'], $_POST['pass']); //Realizamos el metodo y en la funcion hay que pasarle el usuaior y el pass
                    //que el usuario a introducido, pero no como $usuario o $pass como en el modelo, se hace mediante el $_POST que se manda desde el formlario que esta en la vista
                    //echo $metodo;
                    //En $metodo se va a guaradar el valor que devuelbe el metodo asique vamos a preguntar para hacer una cosa u otra
                    if($metodo == 1) //Se ha iniciado correctamnete
                    {
                        session_start();

                        $_SESSION['sesion1'] = $_POST['usuario'];

                        $this->vista = '../Vista/Vista_inicio.php';                   
                        //header('Location: $this->vista'); //$vista
                        header('Location: ../Vista/Vista_inicio.php');

                        //require_once($this->vista);
                    }
                    else{ //el metodo del modelo retorna 0 y no se inicia la sesion 
                        return '<br><span class="mensaje">Algun campo erroneo</span>';
                    }
                    //}

                    //require_once('../Vista/Vista_login.php');

                }
                

            //}

            
        }
       
    }

?>