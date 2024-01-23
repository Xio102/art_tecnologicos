<?php
include("../../conexion.php");
$stm = $conexion->prepare("SELECT * FROM articulos");
$stm->execute();
$articulos = $stm->fetchAll(PDO::FETCH_ASSOC);
if (isset($_GET['id'])) {
  $txtid = isset($_GET['id']) ? $_GET['id'] : "";
  $stm = $conexion->prepare("DELETE FROM articulos WHERE id = :id");
  $stm->bindParam(":id", $txtid, PDO::PARAM_INT);
  if ($stm->execute()) {
    header("location: index.php");
  } else {
    echo "Error deleting record: " . $stm->errorInfo()[2];
  }
}
?>

<?php include("../../template/header.php") ?>
<table class="table caption-top">
  <div style="padding-bottom: 10px;"></div>
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
    Nuevo
  </button>
  </div>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Description</th>
      <th scope="col">Precio</th>
      <th scope="col">Stock</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php foreach ($articulos as $articulo) { ?>
        <th scope="row"><?php echo $articulo['id']; ?></th>
        <td><?php echo $articulo['nombre']; ?></td>
        <td><?php echo $articulo['descripcion']; ?></td>
        <td><?php echo $articulo['precio']; ?></td>
        <td><?php echo $articulo['stock']; ?></td>
        <td>
          <a href="edit.php?id=<?php echo $articulo['id']; ?>" class="btn btn-warning">editar</a>
          <a href="index.php?id=<?php echo $articulo['id']; ?>" class="btn btn-danger">eliminar</a>
        </td>
    </tr>
  <?php } ?>
  </tbody>
</table>
<?php include("create.php") ?>
<?php include("../../template/footer.php") ?>