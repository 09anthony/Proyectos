<?php if (isset($prod) && !empty($prod)): ?>
    <div class="row"><h2 class="mb-3" style="font-family: 'Domine', serif; color: #222831">Editar producto:  </h2><h2 class="mb-3" style="font-family: 'Domine', serif; color: #222831; font-weight: bold; text-transform: uppercase"><?= $prod->nombre ?> </h2></div>
    <div class="container-fluid px-5 py-4" style="background-color: white ">
        <form action="<?= base_url ?>producto/guardar&id=<?= $prod->id ?>" method="POST" enctype="multipart/form-data">
            <label style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Nombre: </label>
            <input class="form-control mb-3" type="text" name="nombre" value="<?= isset($prod) && is_object($prod) ? $prod->nombre : '' ?>" style=" font-family:'Open Sans', sans-serif; font-weight: bold;" maxlength="50">
            <label style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Descripción: </label>
            <textarea style=" font-family:'Open Sans', sans-serif; font-weight: bold;" class="form-control mb-3" id="exampleFormControlTextarea1"  name="descripcion" rows="3" maxlength="150"> <?= isset($prod) && is_object($prod) ? $prod->descripcion : '' ?></textarea>
            <label style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Precio: </label>
            <input style=" font-family:'Open Sans', sans-serif; font-weight: bold;" class="form-control mb-3 " type="text" name="precio" value="<?= isset($prod) && is_object($prod) ? $prod->precio : '' ?>">
            <label style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Stock: </label>
            <input style=" font-family:'Open Sans', sans-serif; font-weight: bold;" class="form-control mb-3" type="number" name="stock" value="<?= isset($prod) && is_object($prod) ? $prod->stock : '' ?>">
            <label style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Categoria de producto</label>
            <?php $categorias = Utils::showCategorias(); ?>
            <select class="custom-select mb-3" name="categoria" id="inputGroupSelect01" style=" font-family:'Open Sans', sans-serif; font-weight: bold;">
                <?php while ($cat = $categorias->fetch_object()): ?>
                    <option style=" font-family:'Open Sans', sans-serif; font-weight: bold;" value="<?= $cat->id; ?> " <?= isset($prod) && is_object($prod) && $cat->id == $prod->categoria_id ? 'selected' : '' ?>>
                        <?= $cat->nombre; ?>
                    </option>
                <?php endwhile; ?>
            </select>
            <?php if (isset($prod) && is_object($prod) && !empty($prod->imagen)): ?>
                <img src="<?= base_url ?>img/imagen<?= $prod->imagen ?>" width="150px" height="130px"  class="mb-3"><br>
            <?php else: ?>
                <img src="<?= base_url ?>img/imagen/not-found.jpg" width="150px" height="130px"  class="mb-3"><br>
            <?php endif; ?>
            <input  class="mb-3" type="file" name="image"><br/>
            <a style=" font-family:'Open Sans', sans-serif; font-weight: bold;" class="btn btn-warning mt-3" href="<?= base_url ?>producto/gestion"><i class="fas fa-chevron-left"></i> Regresar</a>
            <button type="submit" style=" font-family:'Open Sans', sans-serif; font-weight: bold;" class="btn btn-primary mt-3"><i class="fas fa-pen-alt"></i> Modificar</button>

        </form>
    </div>
<?php else: ?>
    <h3 style="font-family: 'Domine', serif; color: #222831">No contramos productos</h3>
<?php endif; ?>
