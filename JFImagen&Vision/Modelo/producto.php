<?php

class Producto {

    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $imagen;
    private $estado;
    private $db;

    function __construct() {
        $this->db = database::connect();
    }

    function getId() {
        return $this->id;
    }

    function getCategoria_id() {
        return $this->categoria_id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getStock() {
        return $this->stock;
    }

    function getImagen() {
        return $this->imagen;
    }

    function getEstado() {
        return $this->estado;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCategoria_id($categoria_id) {
        $this->categoria_id = $categoria_id;
    }

    function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    function setPrecio($precio) {
        $this->precio = $this->db->real_escape_string($precio);
    }

    function setStock($stock) {
        $this->stock = $this->db->real_escape_string($stock);
    }

    function setImagen($imagen) {
        $this->imagen = $this->db->real_escape_string($imagen);
    }

    function setEstado($estado) {
        $this->estado = $this->db->real_escape_string($estado);
    }

     public function getProduct(){
        $sql = "select p.*, c.nombre as 'c_nombre' from productos p inner join categorias c on p.categoria_id = c.id";
        $procuctos = $this->db->query($sql);
       return $procuctos;
    }
    
    public function guardar(){
        $sql = "insert into productos values(null, '{$this->getCategoria_id()}', '{$this->getNombre()}', '{$this->getDescripcion()}',{$this->getPrecio()},{$this->getStock()},CURDATE(), '{$this->getImagen()}','si');";
        $guardar = $this->db->query($sql);
        $result = false;
        if($guardar){
            $result = true;
        }
        return $result;
    }
    
    public function delete(){
        $sql = "delete  from productos where id = {$this->getId()};";
        $delete = $this->db->query($sql);
        $result = false;
        if($delete){
            $result = true;
        }
        return $result;
    }
    
    public function random($num){
        $sql = "select * from productos where estado!='no' order by rand() limit $num";
        $random = $this->db->query($sql);
        return $random;
    }
    
    public function getProductOnes(){
        $sql = "select * from productos where id = '{$this->getId()}'";
        $getProdcut = $this->db->query($sql);
        return $getProdcut->fetch_object();
    }
    
    public function update(){
        $sql  = "update productos set nombre = '{$this->getNombre()}', descripcion = '{$this->getDescripcion()}', precio = '{$this->precio}', stock = '{$this->stock}', categoria_id='{$this->getCategoria_id()}'";
        if($this->getId() !=null){
            $sql .= ", imagen = '{$this->getImagen()}'";
        }
        $sql .= "where id = '{$this->getId()}';";
        $save = $this->db->query($sql);
        $result = false;
            
        if($save){
            $result = true;
        }
        return $result;
    }
    
    
     public function disable(){
        $cancelar = $this->db->query("update productos set estado='no' where id={$this->getId()}"); 
        $resulst = false;
        if ($cancelar) {
            $resulst = true;
        }
        return $resulst;
    }
    
    public function enable(){
        $cancelar = $this->db->query("update productos set estado='si' where id={$this->getId()}"); 
        $resulst = false;
        if ($cancelar) {
            $resulst = true;
        }
        return $resulst;
    }

}
