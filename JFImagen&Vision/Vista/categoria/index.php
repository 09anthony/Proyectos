<?php
$titulo = 'Categoria';
?>
<div class="container-fluid">
    <div class="jumbotron" style="background-color: darkorange">
        <h1 class="text-center">Gestionar Categoria</h1>
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
                <h5 class="modal-title" id="exampleModalLongTitle">Crear nueva categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="far fa-times-circle"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url ?>categoria/guardar" method="POST">
                    <input class="form-control" type="text" placeholder="Ingresa una nueva categoria" required="" name="categoria">
                    <button type="submit" class="btn btn-success mt-4">Crear</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="far fa-times-circle"></i> Cerrar</button>
            </div>
        </div>
    </div>
</div>
<?php if (isset($_SESSION['newCategory']) && $_SESSION['newCategory'] == 'success'): ?>
    <div class="alert alert-light" role="alert">
        <label style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Se registro Correctamente! Ya lo puede visualizar.</label>
    </div>
<?php elseif (isset($_SESSION['newCategory']) && $_SESSION['newCategory'] == 'failed'): ?>
    <div class="alert alert-light" role="alert">
        <label style=" font-family:'Open Sans', sans-serif; font-weight: bold;">NO se registro Correctamente, intentelo nuevamente.</label>
    </div>
<?php endif; ?>
<?php Utils::deleteSession('newCategory'); ?>

<?php if (isset($_SESSION['Deletecategory']) && $_SESSION['Deletecategory'] == 'success'): ?>
    <div class="alert alert-light" role="alert">
        <label style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Se borro Correctamente!.</label>
    </div>
<?php elseif (isset($_SESSION['Deletecategory']) && $_SESSION['Deletecategory'] == 'failed'): ?>
    <div class="alert alert-light" role="alert">
        <label style=" font-family:'Open Sans', sans-serif; font-weight: bold;">No se completo la operación, intentelo nuevamente.</label>
    </div>
<?php endif; ?>
<?php Utils::deleteSession('Deletecategory'); ?>
<div class="container-fluid p-5" style="background-color: white;">
    <table class="table display table-responsive-lg" >
        <thead class="">
            <tr>
                <th scope="col" style=" font-family:'Open Sans', sans-serif; font-weight: bold;">#</th>
                <th scope="col" style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Nombre</th>
                <th scope="col" style=" font-family:'Open Sans', sans-serif; font-weight: bold;">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($cat = $categorias->fetch_object()): ?>
                <tr>
                    <th scope="row" style=" font-family:'Open Sans', sans-serif; font-weight: bold;"><?= $cat->id ?></th>
                    <td style=" font-family:'Open Sans', sans-serif; font-weight: bold;"><?= $cat->nombre ?></td>
                    <td style=" font-family:'Open Sans', sans-serif; font-weight: bold;"><a href="<?= base_url ?>categoria/delete&id=<?= $cat->id ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</div>
