<?php

require_once 'models/producto.php';

class carritoController {

    public function index() {
        if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1) {
            $carrito = $_SESSION['carrito'];
        } else {
            $carrito = array();
        }
        require_once 'Vista/carrito/index.php';
    }

    public function adquirir() {
        if (isset($_GET['id'])) {
            $producto_id = $_GET['id'];
        } else {
            header('Location:' . base_url);
        }

        if (isset($_SESSION['carrito'])) {
            $contador = 0;
            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                if ($elemento['id_producto'] == $producto_id) {
                    $_SESSION['carrito'][$indice]['unidades'] ++;
                    $contador++;
                }
            }
        }
        if (!isset($contador) || $contador == 0) {
            $producto = new Producto();
            $producto->setId($producto_id);
            $producto = $producto->getProductOnes();


            if (is_object($producto)) {
                $_SESSION['carrito'][] = array(
                    "id_producto" => $producto->id,
                    "precio" => floatval($producto->precio),
                    "unidades" => 1,
                    "producto" => $producto
                );
            }
        }
        header('Location:' . base_url . "carrito/index");
        ob_end_flush();
    }

    public function remove() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            unset($_SESSION['carrito'][$id]);
        }
        header('Location:' . base_url . 'carrito/index');
        ob_end_flush();
    }

    public function deleteall() {
        unset($_SESSION['carrito']);
        header('Location:' . base_url . "carrito/index");
        ob_end_flush();
    }
    
    public function addCar(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $_SESSION['carrito'][$id]['unidades']++;
        }
        header('Location:'.base_url.'carrito/index');
        ob_end_flush();
    }
    
    public function minusCar(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $_SESSION['carrito'][$id]['unidades']--;
            if($_SESSION['carrito'][$id]['unidades'] == 0){
                unset($_SESSION['carrito'][$id]);
            }
        }
        header('Location:'.base_url.'carrito/index');
        ob_end_flush();
    }

}

