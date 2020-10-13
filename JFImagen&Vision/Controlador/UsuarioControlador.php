<?php

require_once 'Modelo/usuario.php';

class usuarioControlador {

    public function index() {
        require_once  'Vista/Inicio/index.php';
    }

    public function login() {
        require_once 'Vista/usuario/login.php';
    }

    public function registro() {
        require_once 'Vista/usuario/formularioderegistro.php';
    }

    public function guardar() {

        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellidoP = isset($_POST['apellidoP']) ? $_POST['apellidoP'] : false;
            $apellidoM = isset($_POST['apellidoM']) ? $_POST['apellidoM'] : false;
            $dni = isset($_POST['dni']) ? $_POST['dni'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;
            if ($nombre && $apellidoP && $apellidoM && $dni && $email && $password) {
                $usuario = new Usuario();
                $usuario->setNombre($nombre);
                $usuario->setApellido_paterno($apellidoP);
                $usuario->setApellido_materno($apellidoM);
                $usuario->setDni($dni);
                $usuario->setEmail($email);
                $usuario->setPassword($password);
                $save = $usuario->registrarU();

                if ($save) {
                    $_SESSION['register'] = "complete";
                } else {
                    $_SESSION['register'] = "failed";
                }
            } else {
                $_SESSION['register'] = "failed";
            }
        } else {
            $_SESSION['register'] = "failed";
        }
        header("Location:" . base_url . 'usuario/registro');
        ob_end_flush();
    }

    public function loguear() {
        if (isset($_POST)) {

            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $pass = isset($_POST['password']) ? $_POST['password'] : false;
            if ($email && $pass) {
                $usuario = new Usuario();
                $usuario->setEmail($email);
                $usuario->setPassword($pass);
                $identity = $usuario->login();


                if ($identity && is_object($identity)) {

                    $_SESSION['identity'] = $identity;

                    if ($identity->rol == 'admin') {
                        $_SESSION['admin'] = true;
                    }
                } else {
                    $_SESSION['error_login'] = 'identificacion fallida !!';
                }
            } else {
                $_SESSION['error_login'] = 'identificacion fallida !!';
            }
        } else {
            $_SESSION['error_login'] = 'identificacion fallida !!';
        }
        header('Location:' . base_url);
    }

    public function CerrarSesion() {
        if (isset($_SESSION['identity'])) {
            unset($_SESSION['identity']);
        }
        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }

        header('Location:' . base_url);
    }

}
