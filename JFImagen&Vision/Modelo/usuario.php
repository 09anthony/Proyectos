<?php

class Usuario {

    private $id;
    private $nombre;
    private $apellido_paterno;
    private $apellido_materno;
    private $dni;
    private $email;
    private $password;
    private $rol;
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

    function getApellido_paterno() {
        return $this->apellido_paterno;
    }

    function getApellido_materno() {
        return $this->apellido_materno;
    }

    function getDni() {
        return $this->dni;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
    }

    function getRol() {
        return $this->rol;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setApellido_paterno($apellido_paterno) {
        $this->apellido_paterno = $this->db->real_escape_string($apellido_paterno);
    }

    function setApellido_materno($apellido_materno) {
        $this->apellido_materno = $this->db->real_escape_string($apellido_materno);
    }

    function setDni($dni) {
        $this->dni = $this->db->real_escape_string($dni);
    }

    function setEmail($email) {
        $this->email = $this->db->real_escape_string($email);
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setRol($rol) {
        $this->rol = $this->db->real_escape_string($rol);
    }

    function registrarU() {
        $sql = "insert into usuarios values(null, '{$this->getNombre()}','{$this->getApellido_paterno()}', '{$this->getApellido_materno()}', '{$this->getDni()}', '{$this->getEmail()}', '{$this->getPassword()}', 'cliente', curdate());";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    function login() {
        $email = $this->email;
        $password = $this->password;
        $sql = "select * from usuarios where email = '$email';";
        $login = $this->db->query($sql);

        if ($login && $login->num_rows == 1) {
            $usuario = $login->fetch_object();
            $verify = password_verify($password, $usuario->password);
            $result = false;
            if ($verify) {
                $result = $usuario;
            }
        }
        return $result;
    }

}
