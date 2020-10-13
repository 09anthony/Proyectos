<?php if (isset($prod)): ?>
    <a href="<?= base_url ?>">Productos </a> <span class="pl-3"style="color: #7d7d7d">></span><span class="pl-3" style="color: black"><?= $prod->nombre ?></span>
    <div class="container-fluid d-flex justify-content-center mt-4 mb-5 p-5 " style="background-color: white">
        <div class="container row">
            <div class="col-md-6" >
                <?php if ($prod->imagen != null): ?>
                    <img  width="450px"  src="<?= base_url ?>img/imagen/<?= $prod->imagen ?>" class="img-thumbnail" alt="..." >
                <?php else: ?>
                    <img  width="450px"  src="<?= base_url ?>img/imagen/not-found.png" class="img-thumbnail" alt="...">
                <?php endif; ?>
            </div>
            <div class="col-md-6" style="line-height: 75px">
                <h1 class="pb-4" style="font-family: 'Domine', serif;font-weight: bold"><?= $prod->nombre ?></h1>
                <h4 style="color: #011e1b;font-family:'Open Sans', sans-serif; font-size: 18px"><?= $prod->descripcion ?></h4>
                <span style="color: #805938; font-size: 40px;font-family: 'Domine', serif;font-weight: bold">s/. <?= $prod->precio ?></span><br/>
                <a href="<?= base_url ?>carrito/adquirir&id=<?= $prod->id ?>" class="btn" style="background: #5f9c30; color: white; font-size: 20px; padding: 10px 20px;font-family: 'Domine', serif;"><i class="fas fa-cart-arrow-down"> Añadir a carrito</i></a>
            </div>
        </div>
    </div>
<?php else: ?>
    <h1   style="font-family: 'Domine', serif; ">La categoria no existe</h1>
<?php endif ?>

<hr>

<?php if (isset($random)): ?>
    <?php if ($random->num_rows == 0): ?>
        <h2 style="font-family: 'Domine', serif;">No hay productos para mostrar</h2>
    <?php else: ?>
        <h2 style="font-family: 'Domine', serif;">Sugerencias</h2>
        <div class="container-fluid d-flex  justify-content-center" >
            <div class="container row justify-content-around">
                <?php while ($rand = $random->fetch_object()): ?>
                    <div class="card mb-5">
                        <?php if ($rand->imagen != null): ?>
                            <a href="<?= base_url ?>producto/vista&id=<?= $rand->id ?>"> 
                                <img width="288px" height="250px" src="<?= base_url ?>img/imagen/<?= $rand->imagen ?>" class="card-img-top" alt="..." >
                            </a>
                        <?php else: ?>
                            <a href="<?= base_url ?>producto/vista&id=<?= $rand->id ?>"> 
                                <img width="288px" height="250px" src="<?= base_url ?>img/imagen/not-found.png" class="card-img-top" alt="...">
                            </a>
                        <?php endif; ?>
                        <div class="card-body text-center" >
                            <h5 class="card-title" style="font-family:'Open Sans', sans-serif; font-weight: bold"><?= $rand->nombre ?></h5>
                            <p class="card-text" style="color: #805938; font-size: 25px; font-family: 'Domine', serif;"> s/.<?= $rand->precio ?></p>
                            <a href="<?= base_url ?>carrito/adquirir&id=<?= $prod->id ?>" class="btn btn-success" style="font-family:'Open Sans', sans-serif; width: 100%"><i class="fas fa-cart-plus"> Añadir a carrito</i></a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>

    <?php endif; ?>
<?php else: ?>
    <h1 style="font-family: 'Domine', serif">La categoria no existe</h1>
<?php endif ?>
