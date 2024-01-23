<?php
if ($_POST) {
    $nombre = (isset($_POST['nombre']) ? $_POST['nombre'] : "");
    $descripcion = (isset($_POST['descripcion']) ? $_POST['descripcion'] : "");
    $precio = (isset($_POST['precio']) ? $_POST['precio'] : "");
    $stock = (isset($_POST['stock']) ? $_POST['stock'] : "");
    $stm = $conexion->prepare("INSERT INTO articulos(id,nombre,descripcion,precio,stock)
    VALUES(null,:nombre,:descripcion,:precio,:stock)");
    $stm->bindParam(":nombre", $nombre);
    $stm->bindParam(":descripcion", $descripcion);
    $stm->bindParam(":precio", $precio);
    $stm->bindParam(":stock", $stock);
    $stm->execute();
    echo '<script>window.location.href = window.location.href;</script>';
}
?>

<!-- Modal -->
<div>
    <div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Articulo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="" placeholder="Ingrese nombre" required>

                        <label for="descripcion">Descripcion</label>
                        <input type="text" class="form-control" name="descripcion" value="" placeholder="Ingrese descripcion">

                        <label for="precio">Precio</label>
                        <input type="text" class="form-control" name="precio" value="" placeholder="Ingrese precio">

                        <label for="stock">Stock</label>
                        <input type="number" class="form-control" name="stock" value="" placeholder="Ingrese stock">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>