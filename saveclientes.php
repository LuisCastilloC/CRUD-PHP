<?php

include("db.php");

if (isset($_POST['saveclientes'])) {
    $RAZON_SOCIAL = $_POST['RAZON_SOCIAL'];
    $RFC = $_POST['RFC'];

    $query = "INSERT INTO clientes(IDCLIENTE,RAZON_SOCIAL,RFC) VALUES ('IDCLIENTE','$RAZON_SOCIAL', '$RFC')";
  
    $result = mysqli_query($conn, $query);
    if(!$result) {
      die("Query Failed.");
    }
  
    $_SESSION['message'] = 'cliente Saved Successfully';
    $_SESSION['message_type'] = 'success';
    header('Location: clientes.php');
  
  }
?>

