<?php if(isset($_SESSION['identity'])): ?>
<h2 style="font-family: 'Domine', serif;">Ingresar dirección de envio</h2>
    <form action="<?= base_url ?>pedido/adquirir" method="POST"  >
        <label>Provincia *</label>
        <input class="form-control mb-3" type="text" name="provincia" required="" maxlength="60">
        <label>Distrito *</label>
        <input class="form-control mb-3" type="text" name="distrito" required="" maxlength="60">
        <label>Direccion *</label>
        <input class="form-control mb-3" type="text" name="direccion" required="" maxlength="60">
    <button class="btn btn-success">Enviar</button>
</form>
<?php else: ?>
<h2>Debes de estar registrado</h2>
    <div class="alert alert-danger" role="alert">
        <label>Crea tu usuario e ingresa por favor para separar tu pedido.</label>
    </div>
<?php endif; ?>
