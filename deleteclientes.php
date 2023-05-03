<?php
    include("db.php");

    if(isset($_GET['IDCLIENTE'])) {
        $IDCLIENTE = $_GET['IDCLIENTE'];
        $query = "DELETE FROM clientes WHERE IDCLIENTE = $IDCLIENTE";
        $result = mysqli_query($conn, $query);
        if(!$result) {
          die("Query Failed.");
        }
      
        $_SESSION['message'] = 'cliente eliminado exitosamente';
        $_SESSION['message_type'] = 'danger';
        header('Location: clientes.php');
    }
      
?>