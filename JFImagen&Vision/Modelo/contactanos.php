<?php

class Contactanos{
    
    private $id;
    private $nombre;
    private $email;
    private $telefono;
    private $mensaje;
    private $db;
    
    function __construct($db) {
        $this->db = database::connect();
    }
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getEmail() {
        return $this->email;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getMensaje() {
        return $this->mensaje;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setEmail($email) {
        $this->email = $this->db->real_escape_string($email);
    }

    function setTelefono($telefono) {
        $this->telefono = $this->db->real_escape_string($telefono);
    }

    function setMensaje($mensaje) {
        $this->mensaje = $this->db->real_escape_string($mensaje);
    }
    
    function mensaje(){
        $sql = "insert into mensaje values(null, '{$this->getNombre()}','{$this->getEmail()}', '{$this->getTelefono()}', '{$this->getMensaje()}');";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

}
