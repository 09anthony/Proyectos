<?php

require_once 'Modelo/producto.php';

class productoControlador {

    public function index() {
        
        require_once 'Vista/producto/index.php';
    }

    public function gestion() {
        Utils::isAdmin();
        $productos = new Producto();
        $producto = $productos->getProduct();
        require_once 'Vista/producto/gestion.php';
    }

    public function guardar() {
        Utils::isAdmin();
        if ($_POST) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
            $precio = floatval($precio);
            $stock = intval($stock);

            $imagen = isset($_FILES['image']) ? $_FILES['image'] : false;

            if ($nombre && $precio && $descripcion && $stock && $categoria) {

                if (is_numeric($stock) && !empty($stock) && !empty($precio) && is_float($precio)) {
                    $producto = new Producto();
                    $producto->setNombre($nombre);
                    $producto->setDescripcion($descripcion);
                    $producto->setCategoria_id($categoria);
                    $producto->setPrecio($precio);
                    $producto->setStock($stock);
                    if ($imagen) {
                        $filename = $imagen['name'];
                        $minitype = $imagen['type'];

                        if ($minitype == 'imagen/jpg' || $minitype == 'imagen/jpg' || $minitype == 'imagen/png' || $minitype == 'image/gif') {
                            if (!is_dir('img/imagen')) {
                                mkdir('img/imagen', 0777, true);
                            }
                            $producto->setImagen($filename);
                            move_uploaded_file($imagen['tmp_name'], 'img/imagen/' . $filename);
                        }
                    }

                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $producto->setId($id);
                        $guardar = $producto->update();
                    } else {
                        $guardar = $producto->guardar();
                    }

                    if ($guardar) {
                        $_SESSION['newProduct'] = 'success';
                    } else {
                        $_SESSION['newProduct'] = 'failed';
                    }
                } else {
                    $_SESSION['newProduct'] = 'failed';
                }
            } else {
                $_SESSION['newProduct'] = 'failed';
            }
        } else {
            $_SESSION['newProduct'] = 'failed';
        }
        header('Location:' . base_url . 'producto/gestion');
        ob_end_flush();
    }

    public function delete() {
        Utils::isAdmin();
        if (isset($_GET)) {
            $id = isset($_GET['id']) ? $_GET['id'] : 'false';
            if (!empty($id)) {
                $producto = new Producto();
                $producto->setId($id);
                $delete = $producto->delete();
                if ($delete) {
                    $_SESSION['DeleteProduct'] = 'success';
                } else {
                    $_SESSION['DeleteProduct'] = 'failed';
                }
            } else {
                $_SESSION['DeleteProduct'] = 'failed';
            }
        } else {
            $_SESSION['DeleteProduct'] = 'failed';
        }
        header('Location:' . base_url . 'producto/gestion');
        ob_end_flush();
    }

    public function update() {
        Utils::isAdmin();

        if (isset($_GET)) {
            $id = isset($_GET['id']) ? $_GET['id'] : false;
            if ($id) {
                $producto = new Producto();
                $producto->setId($id);
                $prod = $producto->getProductOnes();
            } else {
                header('Location:' . base_url . 'producto/gestion');
                ob_end_flush();
            }
        }

        require_once 'Vista/producto/editar.php';
    }

    public function vista() {
        if (isset($_GET)) {
            $id = isset($_GET['id']) ? $_GET['id'] : false;
            if ($id) {
                $producto = new Producto();
                $producto->setId($id);
                $prod = $producto->getProductOnes();

                $random = $producto->random(3);
            } else {
                header('Location:' . base_url);
                ob_end_flush();
            }
        }
        require_once 'Vista/producto/vista.php';
    }

    public function disable() {
        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);
            $cancelar = $producto->disable();
            if ($cancelar) {
                $_SESSION['cancelar'] = 'complete';
            } else {
                $_SESSION['cancelar'] = 'failed';
            }
        } else {
            $_SESSION['cancelar'] = 'failed';
        }
        header('Location:' . base_url . 'producto/gestion');
    }

    public function enable() {
        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);
            $cancelar = $producto->enable();
            if ($cancelar) {
                $_SESSION['visualizar'] = 'complete';
            } else {
                $_SESSION['visualizar'] = 'failed';
            }
        } else {
            $_SESSION['visualizar'] = 'failed';
        }
        header('Location:' . base_url . 'producto/gestion');
    }

}
