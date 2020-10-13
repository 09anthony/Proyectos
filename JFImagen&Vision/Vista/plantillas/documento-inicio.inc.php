<!doctype html>
<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?= base_url ?>css/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <?php
        if (!isset($titulo) || empty($titulo)) {
            $titulo = 'JFImagen&Visión';
        }
        echo "<title>$titulo</title>";
        ?>
    </head>
    <body style="background-color: azure">
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="<?= base_url ?>usuario/index">JFImagen&Visión</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url ?>usuario/login">Registrarse</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url?>producto/index">Productos de Belleza</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Perfumeria Bazar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Articulos Para El Hogar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url ?>contactanos/index">Contactanos</a>
                        </li>
                        <?php if (isset($_SESSION['identity'])): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><?= $_SESSION['identity']->nombre ?></a>
                            </li>
                            <?php if (isset($_SESSION['admin'])): ?>
                                <a class="nav-link" href="<?= base_url ?>pedido/gestion">Gestionar Pedidos</a>
                                <a class="nav-link" href="<?= base_url ?>producto/gestion">Gestionar Productos</a>
                                <a class="nav-link" href="<?= base_url ?>categoria/index">Gestionar Categorias</a>
                            <?php endif; ?>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?= base_url ?>usuario/CerrarSesion">CerrarSesion</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </nav>
        </header>

