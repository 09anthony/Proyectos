<?php

class Categoria {

    private $id;
    private $nombre;
    private $db;

    function __construct() {
        $this->db = database::connect();
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    public function getCategoria() {
        $sql = "select * from categorias";
        $getcat = $this->db->query($sql);
        return $getcat;
    }

    public function guardar() {
        $sql = "insert into categorias values(null, '{$this->getNombre()}');";
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function delete() {
        $sql = "delete from categorias where id = '{$this->getId()}';";
        $delete = $this->db->query($sql);
        $result = false;
        if ($delete) {
            $result = true;
        }
        return $result;
    }
    
    public function getCategoryOne(){
        $sql = "select * from categorias where id = '{$this->getId()}';";
        $getCategoryOne = $this->db->query($sql);
        return $getCategoryOne->fetch_object();
    }
    
    public function getOne(){
        $sql="select * from productos where categoria_id in (select id from categorias where id = '{$this->getId()}')";
        $getOne = $this->db->query($sql);
        return $getOne;
    }

}
