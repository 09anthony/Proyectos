<?php

require_once 'Modelo/contactanos.php';

class contactanosControlador {

    public function index() {
        require_once 'Vista/contactanos/index.php';
    }

    public function mensaje() {

        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : false;
            $mensaje = isset($_POST['mensaje']) ? $_POST['mensaje'] : false;
            if ($nombre && $email && $telefono && $mensaje) {
                $mensaje = new Mensaje();
                $mensaje->setNombre($nombre);
                $mensaje->setApellido_paterno($email);
                $mensaje->setApellido_materno($telefono);
                $mensaje->setPassword($mensaje);
                $save = $mensaje->mensaje();

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
        header("Location:" . base_url . 'contactanos/index');
        ob_end_flush();
    }

}
