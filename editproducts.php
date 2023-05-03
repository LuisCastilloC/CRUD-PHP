<?php
    include("db.php");

    if(isset($_GET['IDMATERIAL'])) {
        $IDMATERIAL = $_GET['IDMATERIAL'];
        $query = "SELECT * FROM productos WHERE IDMATERIAL = $IDMATERIAL";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $DESCRIPCION = $row['DESCRIPCION'];
            $UNIDADMEDIDA = $row['UNIDADMEDIDA'];
            $PRECIO1 = $row['PRECIO1'];
        }
    }

    if (isset($_POST['update'])) {
        $IDMATERIAL = $_GET['IDMATERIAL'];
        $DESCRIPCION= $_POST['DESCRIPCION'];
        $UNIDADMEDIDA = $_POST['UNIDADMEDIDA'];
        $PRECIO1 = $_POST['PRECIO1'];
      
        $query = "UPDATE productos set IDMATERIAL = '$IDMATERIAL', DESCRIPCION = '$DESCRIPCION', UNIDADMEDIDA = '$UNIDADMEDIDA' , PRECIO1 ='$PRECIO1' WHERE IDMATERIAL=$IDMATERIAL";
        mysqli_query($conn, $query);
        $_SESSION['message'] = 'producto actualizado exitosamente';
        $_SESSION['message_type'] = 'warning';
        header('Location: productos.php');
      } 



?>

<?php include('includes/header.php')?>

<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="editproducts.php?IDMATERIAL=<?php echo $_GET['IDMATERIAL']; ?>" method="POST">
        <div class="form-group">
            <input type="text"  name="DESCRIPCION" class="form-control"  value="<?php echo $DESCRIPCION; ?>" placeholder="Actualiza Descripcion">
        </div>
        <div class="form-group">
            <textarea name="UNIDADMEDIDA" class="form-control" cols="30" rows="1"><?php echo $UNIDADMEDIDA;?></textarea>
        </div>
        <div>
            <textarea name="PRECIO1" class="form-control" cols="30" rows="1"><?php echo $PRECIO1;?></textarea>
        </div>

        <button class="btn-success" name="update">Actualizar</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php')?>