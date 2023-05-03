<?php
    include("db.php");

    if(isset($_GET['IDCLIENTE'])) {
        $IDCLIENTE = $_GET['IDCLIENTE'];
        $query = "SELECT * FROM clientes WHERE IDCLIENTE = $IDCLIENTE";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);

            $RAZON_SOCIAL = $row['RAZON_SOCIAL'];
            $RFC = $row['RFC'];
        }
    }

    if (isset($_POST['update'])) {
        $IDMATERIAL = $_GET['IDCLIENTE'];
        $RAZON_SOCIAL= $_POST['RAZON_SOCIAL'];
        $RFC = $_POST['RFC'];
      
        $query = "UPDATE clientes set IDCLIENTE = '$IDCLIENTE', RAZON_SOCIAL = '$RAZON_SOCIAL', RFC = '$RFC' WHERE IDCLIENTE=$IDCLIENTE";
        mysqli_query($conn, $query);
        $_SESSION['message'] = 'cliente actualizado exitosamente';
        $_SESSION['message_type'] = 'warning';
        header('Location: clientes.php');
      } 



?>

<?php include('includes/header.php')?>

<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="editclientes.php?IDCLIENTE=<?php echo $_GET['IDCLIENTE']; ?>" method="POST">
        <div class="form-group">
            <input type="text"  name="RAZON_SOCIAL" class="form-control"  value="<?php echo $RAZON_SOCIAL; ?>" placeholder="Actualiza Razon social">
        </div>
        <div class="form-group">
            <textarea name="RFC" class="form-control" cols="30" rows="1"><?php echo $RFC;?></textarea>
        </div>

        <button class="btn-success" name="update">Actualizar</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php')?>