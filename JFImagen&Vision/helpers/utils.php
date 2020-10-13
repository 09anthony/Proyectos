<?php

class Utils {

    public static function deleteSession($nombre) {
        if (isset($_SESSION[$nombre])) {
            $_SESSION[$nombre] = null;
            unset($_SESSION[$nombre]);
        }
        return $nombre;
    }

    public static function isIdentity() {
        if (!isset($_SESSION['identity'])) {
            header('Location:' . base_url);
            ob_end_flush();
        } else {
            return true;
        }
    }

        public static function isAdmin() {
        if (!isset($_SESSION['admin'])) {
            header('Location:' . base_url);
            ob_end_flush();
        } else {
            return true;
        }
    }
    public static function showCategorias(){
        require_once 'Modelo/categoria.php';
        $categoria = new Categoria();
        $categorias = $categoria->getCategoria();
        return $categorias;
    }

    public static function carrito(){
        $stast = array(
          'count' => 0,
          'total' => 0
        );
        if(isset($_SESSION['carrito'])){
            $stast['count'] = count($_SESSION['carrito']);
            foreach ($_SESSION['carrito'] as $index => $producto){
                $stast['total'] += $producto['precio']*$producto['unidades'];   
            }   
        }
        return $stast;
    }
    
    public static function showEstado($status){
        $value = "Pendiente";
        if($status == 'confirm'){
            $value="Pendiente";
        } elseif ($status == 'preparation') {
            $value = "En preparacion";
        } elseif ($status == 'ready') {
            $value = "Confirmado";
        } elseif ($status == 'sended') {
            $value = "Enviado";
        }
        return $value;
    }
}
