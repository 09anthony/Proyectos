
<div class="container-fluid">
    <div class="jumbotron" style="background-color: darkorange">
        <h1 class="text-center">Gestionar Producto</h1>
    </div>
    <div>
        <button type="button" class="btn btn-light mr-3 mt-2"  data-toggle="modal" data-target="#exampleModalCenter">
            Crear nuevo Producto
        </button>
    </div>
</div>
    <br>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Crear nueva Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="far fa-times-circle"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url ?>producto/guardar" method="POST" enctype="multipart/form-data">
                        <input class="form-control mb-3" type="text" placeholder="Nombre de producto" required="" name="nombre" maxlength="50">
                        <textarea class="form-control mb-3" rows="3" name="descripcion" placeholder="Descripcion del producto"></textarea>
                        <input class="form-control mb-3" type="text" placeholder="Precio de producto (00.00)" required="" name="precio">
                        <input class="form-control mb-3" type="number" placeholder="Stock" required="" name="stock">
                        <select class="custom-select mr-sm-2 mb-3" name="categoria">
                            <?php $cat = Utils::showCategorias(); ?>
                            <?php while ($category = $cat->fetch_object()): ?>
                                <option value="<?= $category->id ?>"><?= $category->nombre ?></option>
                            <?php endwhile; ?>
                        </select>
                        <input type="file" name="imagen"><br/>
                        <button type="submit" class="btn btn-success mt-4">Crear</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="far fa-times-circle"></i> Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <?php if (isset($_SESSION['newProduct']) && $_SESSION['newProduct'] == 'success'): ?>
        <div class="alert alert-light" role="alert">
            <label style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Se registro Correctamente! Ya lo puede visualizar.</label>
        </div>
    <?php elseif (isset($_SESSION['newProduct']) && $_SESSION['newProduct'] == 'failed'): ?>
        <div class="alert alert-light" role="alert">
            <label style=" font-family:'Open Sans', sans-serif; font-weight: bold;">NO se ingreso Correctamente, intentelo nuevamente.</label>
        </div>
    <?php endif; ?>
    <?php Utils::deleteSession('newProduct'); ?>

    <?php if (isset($_SESSION['DeleteProduct']) && $_SESSION['DeleteProduct'] == 'success'): ?>
        <div class="alert alert-light" role="alert">
            <label style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Se borro Correctamente!.</label>
        </div>
    <?php elseif (isset($_SESSION['DeleteProduct']) && $_SESSION['DeleteProduct'] == 'failed'): ?>
        <div class="alert alert-light" role="alert">
            <label style=" font-family:'Open Sans', sans-serif; font-weight: bold;">NO se completo la operación, intentelo nuevamente.</label>
        </div>
    <?php endif; ?>
    <?php Utils::deleteSession('DeleteProduct'); ?>

    <div class="container-fluid p-5" style="background-color: white;">
        <table class="table display table-responsive-lg" >
            <thead class="">
                <tr>
                    <th scope="col" style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Id</th>
                    <th scope="col" style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Imagen</th>
                    <th scope="col" style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Nombre</th>
                    <th scope="col" style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Precio Actual</th>
                    <th scope="col" style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Stock</th>
                    <th scope="col" style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Categoria</th>
                    <th scope="col" style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Eliminar</th>
                    <th scope="col" style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Editar</th>
                    <th scope="col" style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Visualizar</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($prod = $producto->fetch_object()): ?>
                    <tr>
                        <th scope="row" style=" font-family:'Open Sans', sans-serif; font-weight: bold;"><?= $prod->id ?></th>
                        <th scope="row" style=" font-family:'Open Sans', sans-serif; font-weight: bold;">
                            <?php if (isset($prod->imagen) && !empty($prod->imagen)): ?>
                                <img src="<?= base_url ?>img/imagen<?= $prod->imagen ?>" class="card-img-top img-thumbnail" alt="..." style="width: 120px !important">
                            <?php else: ?>
                                <img src="<?= base_url ?>img/imagen/not-found.jpg" class="card-img-top img-thumbnail" alt="..." style="width: 120px !important">
                            <?php endif; ?>
                        </th>
                        <td style=" font-family:'Open Sans', sans-serif; font-weight: bold;"><?= $prod->nombre ?></td>
                        <td style=" font-family:'Open Sans', sans-serif; font-weight: bold;"><?= $prod->precio ?></td>
                        <td style=" font-family:'Open Sans', sans-serif; font-weight: bold;"><?= $prod->stock ?></td>
                        <td style=" font-family:'Open Sans', sans-serif; font-weight: bold;"><?= $prod->c_nombre ?></td>
                        <td style=" font-family:'Open Sans', sans-serif; font-weight: bold;"><a href="<?= base_url ?>producto/delete&id=<?= $prod->id ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
                        <td style=" font-family:'Open Sans', sans-serif; font-weight: bold;"><a href="<?= base_url ?>producto/update&id=<?= $prod->id ?>" class="btn btn-info"><i class="fas fa-edit"></i></a></td>
                        <td style=" font-family:'Open Sans', sans-serif; font-weight: bold;">
                            <?php if ($prod->estado == 'si'): ?>
                                <a  href="<?= base_url ?>producto/disable&id=<?= $prod->id ?>" class="btn btn-light"><i class="fas fa-eye">Activo</i></a>
                            <?php elseif ($prod->estado == 'no'): ?>
                                <a href="<?= base_url ?>producto/enable&id=<?= $prod->id ?>" class="btn btn-dark"><i class="fas fa-eye-slash">Inactivo</i></a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
