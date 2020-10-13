<?php

ob_start();
session_start();
require_once 'autoload.php';
require 'Config/config.inc.php';
require_once 'helpers/utils.php';
require_once 'config/parameters.php';
require_once 'Vista/plantillas/documento-inicio.inc.php';


function show_error() {
    $error = new errorControlador();
    $error-> index();
}

if (isset($_GET['controlador'])) {
    $nombre_controlador = $_GET['controlador'] . 'Controlador';
}elseif (!isset ($_GET['controlador']) && !isset ($_GET['action'])) {
    $nombre_controlador = 'inicioControlador';
} else {
    show_error();
    exit();
}

if (class_exists($nombre_controlador)) {
    $controlador = new $nombre_controlador;
    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action();
    }elseif (!isset ($_GET['controller']) && !isset ($_GET['action'])) {
        $action_default = 'index';
        $controlador->$action_default();
    } else {
        show_error();
    }
} else {
    show_error();
}

require_once 'Vista/plantillas/documento-cierre.inc.php';