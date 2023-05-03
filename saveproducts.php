<?php

include("db.php");

if (isset($_POST['saveproducts'])) {
    $DESCRIPCION = $_POST['DESCRIPCION'];
    $UNIDADMEDIDA = $_POST['UNIDADMEDIDA'];

    $PRECIO1 = $_POST['PRECIO1'];
    

    $query = "INSERT INTO productos(IDMATERIAL,DESCRIPCION,UNIDADMEDIDA,PRECIO1) VALUES ('IDMATERIAL','$DESCRIPCION', '$UNIDADMEDIDA', '$PRECIO1')";
  
    $result = mysqli_query($conn, $query);
    if(!$result) {
      die("Query Failed.");
    }
  
    $_SESSION['message'] = 'Producto Saved Successfully';
    $_SESSION['message_type'] = 'success';
    header('Location: productos.php');
  
  }
?>

