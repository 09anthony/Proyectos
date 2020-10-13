<?php if (isset($_SESSION['identity'])): ?>
    <?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == "complete"): ?>
        <div class="alert alert-success" role="alert">
            <label style=" font-family:'Open Sans', sans-serif; font-weight: bold;color: black">Pedido registrado correctamente, espere nuestra confirmación en su bandeja de pedidos.</label>
        </div>
        <?php $stats = Utils::carrito(); ?>
        <h4>Datos de envio</h4>
        <div class="ml-3 mb-3"><span style=" font-family:'Open Sans', sans-serif"># de pedido: <strong><?=$datosPedido->id?></strong></span><br>
            <span>Provincia: <strong><?= $datosPedido->provincia ?></strong></span><br>
            <span>Distrito: <strong><?= $datosPedido->distrito ?></strong></span><br>
            <span>Direccion: <strong><?= $datosPedido->direccion ?></strong></span><br>
        </div>
        <h4>Total:</h4>
        <div class="ml-3"><h5>s./ <?= $datosPedido->coste ?></h5></div>
        <div class="container-fluid p-5 my-4" style="background-color: white;">
            <table class="table cliente table-responsive-lg" >
                <thead class="">
                    <tr>
                        <th scope="col" style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Imagen</th>
                        <th scope="col" style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Nombre</th>
                        <th scope="col" style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Precio</th>
                        <th scope="col" style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Unidades</th>
                        <th scope="col" style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Precio Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($prod = $productos->fetch_object()): ?>
                        <tr>
                            <th scope="row" style=" font-family:'Open Sans', sans-serif; font-weight: bold;">
                                <?php if (isset($prod->imagen) && !empty($prod->imagen)): ?>
                                    <img src="<?= base_url ?>img/imagen/<?= $prod->imagen ?>" class="card-img-top img-thumbnail" alt="..." style="width: 120px !important">
                                <?php else: ?>
                                    <img src="<?= base_url ?>img/imagen/not-found.png" class="card-img-top img-thumbnail" alt="..." style="width: 120px !important">
                                <?php endif; ?>
                            </th>
                            <td><?= $prod->nombre ?></td>
                            <td><?= $prod->precio_producto ?></td>
                            <td>S./ <?= $prod->unidades ?> </td>
                            <td><?= $prod->precio_total ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

    <?php else: ?>
        <h2 >No se completo la operación</h2>
        <div class="alert alert-danger" role="alert">
            <label>Intentelo mas tarde, por favor</label>
        </div>
    <?php endif; ?>
<?php else: ?>
    <?php
    header('Location:' . base_url);
    ob_end_flush();
    ?>
<?php endif;
?>
