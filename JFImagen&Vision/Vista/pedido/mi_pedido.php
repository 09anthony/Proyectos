<?php if(isset($gestion)): ?>
<div class="container-fluid">
    <div class="jumbotron" style="background-color: darkorange">
        <h1 class="text-center">Gestionar Pedidos</h1>
    </div>
</div>
<?php else: ?>
<h2 style="font-family: 'Domine', serif;">Mis Pedidos</h2>
<?php endif; ?> 
<div class="container-fluid p-5 my-4" style="background-color: white;">
    <table class="table cliente table-responsive-lg" >
        <thead class="">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Precio</th>
                <th scope="col">Fecha</th>
                <th scope="col">Estado</th>
                <th scope="col">Visualizar</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($pedido = $pedidos->fetch_object()): ?>
                <tr>
                    <td style=" font-family:'Open Sans', sans-serif; font-weight: bold;"><?= $pedido->id ?></td>
                    <td style=" font-family:'Open Sans', sans-serif; font-weight: bold;">S./ <?= $pedido->coste ?></td>
                    <td style=" font-family:'Open Sans', sans-serif; font-weight: bold;"> <?= $pedido->fecha ?></td>
                    <td style=" font-family:'Open Sans', sans-serif; font-weight: bold;"><?= Utils::showEstado($pedido->estado) ?></td>
                    <td><a style="font-size: 20px; color:#54B524" href="<?= base_url ?>pedido/detalle&id=<?= $pedido->id ?>"><i class="fas fa-eye"></i></a></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
