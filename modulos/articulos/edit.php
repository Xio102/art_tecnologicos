<?php
include("../../conexion.php");

if (isset($_GET['id'])) {
  $txtid = isset($_GET['id']) ? $_GET['id'] : "";
  $stm = $conexion->prepare("SELECT * FROM articulos WHERE id = :id");
  $stm->bindParam(':id', $txtid, PDO::PARAM_INT); // Assuming 'id' is an integer
  $stm->execute();
  $registro = $stm->fetch(PDO::FETCH_LAZY);
  $nombre = $registro['nombre'];
  $descripcion = $registro['descripcion'];
  $precio = $registro['precio'];
  $stock = $registro['stock'];
}

if ($_POST) {
  $txtid = isset($_POST['txtid']) ? $_POST['txtid'] : "";
  $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
  $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";
  $precio = isset($_POST['precio']) ? $_POST['precio'] : "";
  $stock = isset($_POST['stock']) ? $_POST['stock'] : "";

  // Prepare the SQL update statement
  $stm = $conexion->prepare("UPDATE articulos SET nombre=:nombre, descripcion=:descripcion, precio=:precio, stock=:stock WHERE id=:txtid");
  $stm->bindParam(":nombre", $nombre);
  $stm->bindParam(":descripcion", $descripcion);
  $stm->bindParam(":precio", $precio);
  $stm->bindParam(":stock", $stock);
  $stm->bindParam(":txtid", $txtid, PDO::PARAM_INT); // Assuming 'id' is an integer
  $stm->execute();

  header("location: index.php");
}


?>

<?php include("../../template/header.php") ?>
<form action="" method="post">
  <div>
    <h3 class="text-center">Actualizar Producto</h3>
    <div class="modal-body" style="padding-bottom: 20px;">

      <input type="hidden" class="form-control" name="txtid" value="<?php echo $txtid; ?>">

      <label for="">Nombre</label>
      <input type="text" class="form-control" name="nombre" value="<?php echo $nombre; ?>" placeholder="Ingrese nombre">

      <label for="">Descripción</label>
      <input type="text" class="form-control" name="descripcion" value="<?php echo $descripcion; ?>" placeholder="Ingrese descripcion">

      <label for="">Precio</label>
      <input type="text" class="form-control" name="precio" value="<?php echo $precio; ?>" placeholder="Ingrese precio">

      <label for="">Stock</label>
      <input type="number" class="form-control" name="stock" value="<?php echo $stock; ?>" placeholder="Ingrese stock">
    </div>
    <div class="modal-footer" style="gap: 5px;">
      <button href="index.php" class="btn btn-danger">Cancelar</button>
      <button type="submit" class="btn btn-success">Guardar</button>
    </div>
  </div>
</form>

<?php include("../../template/footer.php") ?>