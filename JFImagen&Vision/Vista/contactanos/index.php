<?php
$titulo = 'Contactanos';
?>
<?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
    <div class="alert alert-warning" role="alert">
        <label style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Se registro Correctamente! Ya puede Iniciar Sesión.</label>
    </div>
<?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
    <div class="alert alert-warning" role="alert">
        <label style=" font-family:'Open Sans', sans-serif; font-weight: bold;" >Datos no ingresados correctamente, intente nuevamente.</label>
    </div>
<?php endif; ?>
<?php Utils::deleteSession('register') ?>
<div class="container-fluid">
    <div class="jumbotron" style="background-color: darkorange">
        <h1 class="text-center">Contactanos</h1>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-defaul text-center">
                <div class="panel-heading">
                    <h3 class="panel-title">Contactanos</h3>
                </div>
                <div class="panel-body">
                    <br>
                    <p class="text-justify">
                        AV. SANTA ANITA MZA. D1 LOTE. 7B URB. VILLA MARINA, CHORRILLOS, LIMA
                    </p>
                    <p class="text-justify">WhatssApp 981550759</p>
                    <p class="text-justify">Email triunfadora1802@gmail.com</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <form action="<?= base_url ?>contactanos/mensaje" method="POST" class="row">
                <div class="d-flex flex-column col-sm px-4">
                    <div class="panel-heading">
                        <h3>Escríbenos un mensaje</h3>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col"> 
                                <label style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Nombre</label>
                                <input type="text" id="contactFormName" name="nombre" placeholder="Nombre" autocapitalize="words" value="">
                            </div>
                            <div class="col">
                                <label style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Email</label>
                                <input type="email" id="contactFormEmail" name="email" placeholder="Email" autocorrect="off" autocapitalize="off" value="">
                            </div>
                            <div class="w-100"></div>
                            <div class="col">
                                <label style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Teléfono</label>
                                <input type="tel" id="contactFormPhone" name="telefono" placeholder="Teléfono" pattern="[0-9\-]*" value="">
                            </div>
                            <div class="col">
                                <label style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Mensaje</label>
                                <textarea rows="5" id="contactFormMessage" name="mensaje" placeholder="Mensaje"></textarea>
                            </div>
                        </div>  
                        <div class="d-flex flex-column col-sm-4 px-4">
                            <input type="submit" class="button btn px-4 ml-4"  id="entrar" value="Enviar">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div> <br>
</div>

