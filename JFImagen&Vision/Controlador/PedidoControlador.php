<?php

require_once 'Modelo/pedido.php';

class pedidoControlador {

    public function index() {
        
    }

    public function hacer() {
        require_once 'Vista/pedido/hacer.php';
    }

    public function adquirir() {

        if (isset($_SESSION['identity'])) {
            if (isset($_POST)) {
                $usuario_id = $_SESSION['identity']->id;
                $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : '';
                $distrito = isset($_POST['distrito']) ? $_POST['distrito'] : '';
                $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : '';
                $start = Utils::carrito();
                $coste = $start['total'];

                if ($provincia && $distrito && $direccion) {
                    $pedido = new Pedido();
                    $pedido->setUsuario_id($usuario_id);
                    $pedido->setDireccion($direccion);
                    $pedido->setDistrito($distrito);
                    $pedido->setProvincia($provincia);
                    $pedido->setCoste($coste);
                    $save = $pedido->guardar();
                    $save_lineas = $pedido->guardar_linea();
                    if ($save && $save_lineas) {
                        $_SESSION['pedido'] = "complete";
                    } else {
                        $_SESSION['pedido'] = "failed";
                    }
                } else {
                    $_SESSION['pedido'] = "failed";
                }
            }
            header('Location:' . base_url . 'pedido/confirmar');
            ob_end_flush();
        } else {
            header('Location:' . base_url);
            ob_end_flush();
        }
    }

    public function confirmar() {
        if (isset($_SESSION['identity'])) {
            $identity = $_SESSION['identity'];
            $pedido = new Pedido();
            $pedido->setUsuario_id($identity->id);
            $datosPedido = $pedido->getOneByUser();

            $pedidos = new Pedido();
            $productos = $pedidos->getProductByPedido($datosPedido->id);
        }

        require 'Vista/pedido/confirmar.php';
    }

    public function mi_pedido() {
        Utils::isIdentity();

        $usuario_id = $_SESSION['identity']->id;
        $pedido = new Pedido();
        $pedido->setUsuario_id($usuario_id);
        $pedidos = $pedido->getAllUser();

        require_once 'Vista/pedido/mi_pedido.php';
    }

    public function detalle() {
        Utils::isIdentity();

        if (isset($_GET)) {
            $id = isset($_GET['id']) ? $_GET['id'] : false;
            if ($id) {
                $pedido = new Pedido();
                $pedido->setId($id);
                $datosPedido = $pedido->getOne();

                $pedidos = new Pedido();
                $productos = $pedidos->getProductByPedido($datosPedido->id);
            }
        } else {
            header('Location:' . base_url . 'pedido/mis_pedidos');
        }

        require_once 'Vista/pedido/detalle.php';
    }

    public function gestion() {
        Utils::isAdmin();
        $gestion = true;
        $pedido = new Pedido();
        $pedidos = $pedido->getAll();

        require_once 'Vista/pedido/mi_pedido.php';
    }

    public function estado() {
        Utils::isAdmin();
        if (isset($_POST['pedido_id']) && isset($_POST['estado'])) {
            $pedido_id = $_POST['pedido_id'];
            $estado = $_POST['estado'];
            $pedido = new Pedido();
            $pedido->setId($pedido_id);
            $pedido->setEstado($estado);
            $pedido->UpdatePedido();

            header('Location:' . base_url . 'pedido/detalle&id=' . $pedido_id);
        } else {
            header('Location:' . base_url);
            ob_end_flush();
        }
    }

}
