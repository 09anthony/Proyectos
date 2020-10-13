<?php
$titulo = 'Registro';
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
<?php Utils::deleteSession('register')?>
<div class="container-fluid">
    <div class="jumbotron" style="background-color: darkorange">
        <h1 class="text-center">Formulario de Registro</h1>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="d-flex flex-column col-sm-6 px-4">
            <div class="panel panel-defaul text-center">
                <div class="panel-heading">
                    <h3 class="panel-title">Instrucciones</h3>
                </div>
                <div class="panel-body ">
                    <br>
                    <p class="text-justify">
                        Para unirte a la página de JFImagen$Visión, introduce tu nombre y apellidos,
                        tu email y una contraseña.El email que escribas debe ser real ya que lo necesitaras
                        para gestionar tu cuenta.
                        Te recomendamos que uses una contraseña que contenga letras minusculas, mayusculas,
                        números y símbolos.
                    </p>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column col-sm-6 px-4">
            <form action="<?= base_url ?>usuario/guardar" method="POST" class="row" >
                <div class="d-flex flex-column col-sm-6 px-4">
                    <label style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Nombre</label>
                    <input type="text" class="form-control mb-3" name="nombre" value="" required="" maxlength="50">
                </div>
                <div class="d-flex flex-column col-sm-6 px-4">
                    <label style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Apellidos Paterno</label>
                    <input type="text" class="form-control mb-3" name="apellidoP" value="" required="" maxlength="50">
                </div>
                <div class="d-flex flex-column col-sm-6 px-4">
                    <label style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Apellido Materno</label>
                    <input type="text" class="form-control mb-3" name="apellidoM" value="" required="" maxlength="50">
                </div>
                <div class="d-flex flex-column col-sm-6 px-4">
                    <label style=" font-family:'Open Sans', sans-serif; font-weight: bold;">DNI</label>
                    <input type="text" class="form-control mb-3" name="dni" value="" required="" maxlength="8">
                </div>
                <div class="d-flex flex-column col-sm-6 px-4">
                    <label style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Email</label>
                    <input type="email" class="form-control mb-3" name="email" value="" required="" maxlength="50">
                </div>
                <div class="d-flex flex-column col-sm-6 px-4">
                    <label style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Contraseña</label>
                    <input type="password" class="form-control mb-3" name="password" value="" required="" maxlength="10">
                </div>
                <div>
                    <button type="submit" class="btn btn px-4 ml-4" id="registro">Registrarse</button>
                </div>
            </form>
        </div>
    </div>
</div> 
<br>

