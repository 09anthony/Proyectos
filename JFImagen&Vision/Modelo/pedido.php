<?php

class Pedido {

    private $id;
    private $usuario_id;
    private $provincia;
    private $distrito;
    private $direccion;
    private $coste;
    private $estado;
    private $db;

    function __construct() {
        $this->db = database::connect();
    }

    function getId() {
        return $this->id;
    }

    function getUsuario_id() {
        return $this->usuario_id;
    }

    function getProvincia() {
        return $this->provincia;
    }

    function getDistrito() {
        return $this->distrito;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getCoste() {
        return $this->coste;
    }

    function getEstado() {
        return $this->estado;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUsuario_id($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    function setProvincia($provincia) {
        $this->provincia = $this->db->real_escape_string($provincia);
    }

    function setDistrito($distrito) {
        $this->distrito = $this->db->real_escape_string($distrito);
    }

    function setDireccion($direccion) {
        $this->direccion = $this->db->real_escape_string($direccion);
    }

    function setCoste($coste) {
        $this->coste = $coste;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    public function guardar() {
        $sql = "insert into pedidos values(null, '{$this->getUsuario_id()}', '{$this->getProvincia()}', '{$this->getDistrito()}', '{$this->getDireccion()}', {$this->getCoste()}, 'confirm', CURDATE(), CURTIME());";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function guardar_linea() {
        $sql = "select last_insert_id() as 'pedido';";
        $query = $this->db->query($sql);
        $pedido_id = $query->fetch_object()->pedido;

        foreach ($_SESSION['carrito'] as $elemento) {
            $producto = $elemento['producto'];
            $insert = "insert into lineas_pedido values(null, '{$pedido_id}', '{$producto->id}', {$elemento['unidades']}, {$elemento['precio']}, ({$elemento['precio']}*{$elemento['unidades']}));";
            $save = $this->db->query($insert);
            
        }
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }
    
    public function getOneByUser(){
        $sql = "select * from pedidos where usuario_id = '{$this->getUsuario_id()}' order by id desc limit 1;";
        $getOneUser = $this->db->query($sql);
        return $getOneUser->fetch_object();
    }
    
    public function getProductByPedido($id){
        $sql = "select * from lineas_pedido inner join productos on productos.id = lineas_pedido.producto_id where pedido_id={$id};";
        $getOneUser = $this->db->query($sql);
        return $getOneUser;
    }
    
    public function getAllUser(){
        $sql = "select * from pedidos where usuario_id='{$this->getUsuario_id()}' order by id desc;";
        $pedido = $this->db->query($sql);
        return $pedido;
    }
    
     public function getOne(){
        $sql = "select * from pedidos where id = '{$this->getId()}'";
        $pedido = $this->db->query($sql);
        return $pedido->fetch_object();
    }
    
     public function getAll(){
        $sql = "select * from pedidos order by id desc;";
        $pedido = $this->db->query($sql);
        return $pedido;
    }
    
    public function UpdatePedido(){
        $sql = "update pedidos set estado='{$this->getEstado()}' where id = '{$this->getId()}';";
        $update = $this->db->query($sql);
        $result =false;
        if($update){
            $result = true;
        }
        return $result;
    }
    

}

