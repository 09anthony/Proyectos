<?php if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1): ?>
    <?php $stast = Utils::carrito(); ?>
    <div class="row d-flex  justify-content-between" >
        <div class="row"><i class="fas fa-shopping-cart" style="font-size: 35px; color:#54B524"></i><h2 style="font-family: 'Domine', serif; color: #222831; padding-left: 5px; font-weight: bold">Carrito de pedido</h2></div>
        <div>
            <h4 class="mr-5 ml-4" style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Total: s./ <?= $stast['total'] ?></h4>
            <a class="mr-5 ml-4 btn btn-success mb-4" href="<?= base_url ?>pedido/hacer" style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Hacer pedido</a>
        </div>
    </div>
    <div class="container-fluid p-5" style="background-color: white;">
        <table class="table cliente table-responsive-lg" >
            <thead class="">
                <tr>
                    <th scope="col" style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Imagen</th>
                    <th scope="col" style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Nombre</th>
                    <th scope="col" style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Precio Actual</th>
                    <th scope="col" style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Cantidad</th>
                    <th scope="col" style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Sub Total</th>
                    <th scope="col" style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($carrito as $index => $elemento):
                    $prod = $elemento['producto'];
                    ?>
                    <tr>
                        <th scope="row" style=" font-family:'Open Sans', sans-serif; font-weight: bold;">
                            <?php if (isset($prod->imagen) && !empty($prod->imagen)): ?>
                                <img src="<?= base_url ?>img/productos/<?= $prod->imagen ?>" class="card-img-top img-thumbnail" alt="..." style="width: 120px !important">
                            <?php else: ?>
                                <img src="<?= base_url ?>img/productos/imagen" class="card-img-top img-thumbnail" alt="..." style="width: 120px !important">
                            <?php endif; ?>
                        </th>
                        <td style=" font-family:'Open Sans', sans-serif; font-weight: bold;"><?= $prod->nombre ?></td>
                        <td style=" font-family:'Open Sans', sans-serif; font-weight: bold;">s./ <?= $prod->precio ?></td>
                        <td style=" font-family:'Open Sans', sans-serif; font-weight: bold;"> 
                            <a href="<?=base_url?>carrito/addCar&id=<?=$index?>" style="color:#004085"><i class="fas fa-plus"></i></a> &nbsp;
                            <?= $elemento['unidades'] ?> &nbsp;
                            <a href="<?=base_url?>carrito/minusCar&id=<?=$index?>" style="color:#004085"><i class="fas fa-minus"></i></a>
                        </td>
                        <td style=" font-family:'Open Sans', sans-serif; font-weight: bold;">s./ <?= number_format(($elemento['unidades'] * $prod->precio), 2) ?></td>
                        <td style=" font-family:'Open Sans', sans-serif; font-weight: bold;"><a href="<?= base_url ?>carrito/remove&id=<?= $index ?>" style="color:red;font-size: 25px"><i class="fas fa-trash"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a class="ml-3 btn btn-danger my-4" href="<?= base_url ?>carrito/deleteall" style=" font-family:'Open Sans', sans-serif; font-weight: bold;"><i class="fas fa-trash"></i>  Vaciar Carrito</a>
    </div>
<?php else: ?>
    <h2 style="font-family: 'Domine', serif; color: #222831">No tienes productos agregados al carrito de pedido</h2>
    <div class="alert alert-danger" role="alert">
        <label style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Debes de seperar un articulo para poder visualizarlo dentro del carrito de pedido.</label>
    </div>
<?php endif; ?>
