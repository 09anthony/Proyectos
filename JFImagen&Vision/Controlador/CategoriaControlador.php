<?php
require_once 'Modelo/categoria.php';

class categoriaController {

    public function index() {
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getCategoria();

        require_once 'Vista/categoria/index.php';
    }

    public function vista() {
        if (isset($_GET)) {
            $id = isset($_GET['id']) ? $_GET['id'] : false;

            if ($id) {
            //validar que exista datos en la cateogira
                $catValidate = new Categoria();
                $catValidate->setId($id);
                $cat = $catValidate->getCategoryOne();
                
            //obtener productos de la categoria
                $categoria = new Categoria();
                $categoria->setId($id);
                $categorias = $categoria->getOne();
            }
        }
        require_once 'Vista/categoria/vista.php';
    }

    public function guardar() {
        Utils::isAdmin();
        if ($_POST) {
            $nombre = isset($_POST['categoria']) ? $_POST['categoria'] : false;
            if ($nombre) {
                $categoria = new Categoria();
                $categoria->setNombre($nombre);
                $save = $categoria->guardar();
                if ($save) {
                    $_SESSION['newCategory'] = 'success';
                } else {
                    $_SESSION['newCategory'] = 'failed';
                }
            } else {
                $_SESSION['newCategory'] = 'failed';
            }
        } else {
            $_SESSION['newCategory'] = 'failed';
        }
        header('Location:' . base_url . 'categoria/index');
        ob_end_flush();
    }

    public function delete() {
        Utils::isAdmin();
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
            $categoria = new Categoria();
            $categoria->setId($id);
            $delete = $categoria->delete();
            if ($delete) {
                $_SESSION['Deletecategory'] = 'success';
            } else {
                $_SESSION['Deletecategory'] = 'failed';
            }
        } else {
            $_SESSION['Deletecategory'] = 'failed';
        }
        header('Location:' . base_url . 'categoria/index');
        ob_end_flush();
    }

}

