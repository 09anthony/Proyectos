<?php if (isset($cat) && !empty($cat)): ?>
<div class="row"><h2 style="font-family: 'Domine', serif;">Categoria: &nbsp;</h2><h2 class="mb-5" style="font-family: 'Domine', serif;font-weight: bold; text-transform: uppercase"><?= $cat->nombre ?></h2></div>
    <?php if ($categorias->num_rows == 0): ?>
        <div class="alert alert-light" role="alert">
            <label style=" font-family:'Open Sans', sans-serif; font-weight: bold;">No tenemos productos para mostrar</label>
        </div>
    <?php else: ?>

        <div class="container-fluid d-flex  justify-content-center">
            <div class="container row justify-content-around">
                <?php while ($product = $categorias->fetch_object()): ?>
                    <div class="card mb-5" style="width: 18rem;box-shadow: 10px 13px 5px -5px rgba(0,0,0,0.17);border: none">
                        <?php if ($product->imagen != null): ?>
                        <a href="<?= base_url ?>producto/vista&id=<?= $product->id ?>">
                            <img width="288px" height="250px" src="<?= base_url ?>img/productos/<?= $product->imagen ?>" class="card-img-top" alt="..." >
                        </a>
                        <?php else: ?>
                        <a href="<?= base_url ?>producto/vista&id=<?= $product->id ?>">
                            <img width="288px" height="250px" src="<?= base_url ?>img/imagen/not-found.png" class="card-img-top" alt="...">
                        </a>
                        <?php endif; ?>
                        <div class="card-body text-center">
                            <h5 class="card-title" style="font-family:'Open Sans', sans-serif; font-weight: bold"><?= $product->nombre ?></h5>
                            <p class="card-text" style="color: #f27533; font-size: 25px; font-family: 'Domine', serif;"> s/.<?= $product->precio ?></p>
                            <a href="<?= base_url ?>carrito/adquirir&id=<?=$product->id?>" class="btn btn-success" style="font-family:'Open Sans', sans-serif;width: 100%"><i class="fas fa-cart-plus"> Añadir a carrito</i></a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>

    <?php endif; ?>
<?php else: ?>
    <div class="alert alert-light" role="alert">
        <label style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Esta categoria no existe</label>
    </div>
<?php endif; ?>

