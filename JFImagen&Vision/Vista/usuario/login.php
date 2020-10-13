<?php
$titulo = 'Login';
?>
<?php if (!isset($_SESSION['identity'])): ?>
    <span class="navbar-brand mb-0 "><a class="nav-item nav-link active" href="<?= base_url ?>usuario/registro" style="cursor: pointer;color: white; font-family: 'Domine', serif;font-size: 18px"><i class="fas fa-user-plus"></i> Registrate</a></span>
    <span class="navbar-brand mb-0 "><a class="nav-item nav-link active" style="cursor: pointer;color: white; font-family: 'Domine', serif;font-size: 18px" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</a></span>                
<?php else: ?>
<?php endif; ?>
<div class="container-fluid" id="login">
    <br>
    <br>
    <div class="col">
    </div>
    <div class="text-center">
        <img src="<?= base_url ?>img/recursos/logo.jpg" class="img-fluid" alt="imagen del logo">
    </div>
    <div class="col">
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col">
        </div>
        <div class="col-10 col-sm-10 col-md-8 col-lg-6 col-xl-4">
            <form action="<?= base_url ?>usuario/loguear" method="POST"> 
                <label for="login-email" class="sr-only">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
                <br>
                <label for="login-contraseña" class="sr-only">Contraseña</label>
                <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                <br>
                <p>Si no cuentas con una Cuenta dale al Botón "Registrarse".</p>
                <br>
                <input type="submit"  class="btn btn-lg btn-primary btn-block" id="entrar" value="Iniciar Sesión">
                <br>
                <a  href="<?= base_url ?>usuario/registro" class="btn btn-lg btn-primary btn-block" id="registro">Registrarse</a>
                <br>
            </form>
        </div>
        <div class="col">
        </div>
    </div> 
</div>
