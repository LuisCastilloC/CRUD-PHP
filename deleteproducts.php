<?php
    include("db.php");

    if(isset($_GET['IDMATERIAL'])) {
        $IDMATERIAL = $_GET['IDMATERIAL'];
        $query = "DELETE FROM productos WHERE IDMATERIAL = $IDMATERIAL";
        $result = mysqli_query($conn, $query);
        if(!$result) {
          die("Query Failed.");
        }
      
        $_SESSION['message'] = 'producto eliminado exitosamente';
        $_SESSION['message_type'] = 'danger';
        header('Location: productos.php');
    }
      
?>