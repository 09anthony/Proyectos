<?php if (isset($datosPedido)): ?>
    <h4 style=" font-family:'Open Sans', sans-serif; font-weight: bold">Datos de envio</h4>
    <div class="ml-3 mb-3">
        <span># de pedido: <strong><?= $datosPedido->id ?></strong></span><br>
        <span>Provincia: <strong><?= $datosPedido->provincia ?></strong></span><br>
        <span>Distrito: <strong><?= $datosPedido->distrito ?></strong></span><br>
        <span>Direccion: <strong><?= $datosPedido->direccion ?></strong></span><br>
        <span>Estado: <strong style="color:red"><?= Utils::showEstado($datosPedido->estado)?></strong></span><br>
    </div>
    <div class="row d-flex justify-content-between">
        <div class="ml-3">
            <h4>Total:</h4>
            <div class="ml-3"><h5 style="font-family:'Open Sans', sans-serif; font-weight: bold">s./ <?= $datosPedido->coste ?></h5></div>
        </div>
       <?php if (isset($_SESSION['admin'])): ?>
            <div class="mr-3">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#estadoPedido">
                    Cambiar estado del pedido
                </button>
                <div class="modal fade" id="estadoPedido" tabindex="-1" role="dialog" aria-labelledby="estadoPedido" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Estado de pedido</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?=base_url?>pedido/estado" method="POST">
                                    <input type="hidden" value="<?=$datosPedido->id?>" name="pedido_id">
                                    <select name="estado" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                        <option value="confirm" <?= $datosPedido->estado == "confirm" ? 'selected' : '' ?>>Pendiente</option>
                                        <option value="preparation" <?= $datosPedido->estado == "preparation" ? 'selected' : '' ?>>En Preparación</option>
                                        <option value="ready" <?= $datosPedido->estado == "ready" ? 'selected' : '' ?>>Preparado para enviar</option>
                                        <option value="sended" <?= $datosPedido->estado == "sended" ? 'selected' : '' ?>>Enviado</option>
                                    </select>
                                    <button type="submit" class="btn btn-success mt-3">Cambiar</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    
    </div>

    <div class="container-fluid p-5 my-4">
        <table class="table cliente table-responsive-lg" >
            <thead class="">
                <tr>
                    <th scope="col">Imagen</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Unidades</th>
                    <th scope="col">Precio Total</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($prod = $productos->fetch_object()): ?>
                    <tr>
                        <th scope="row">
                            <?php if (isset($prod->imagen) && !empty($prod->imagen)): ?>
                                <img src="<?= base_url ?>img/productos/<?= $prod->imagen ?>" class="card-img-top img-thumbnail" alt="..." style="width: 120px !important">
                            <?php else: ?>
                                <img src="<?= base_url ?>img/productos/imagen.png" class="card-img-top img-thumbnail" alt="..." style="width: 120px !important">
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
<?php endif; ?>
