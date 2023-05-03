<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php session_unset();
            } ?>

            <div class="card card-body">
                <legend>Agregar producto</legend>
                <form action="saveproducts.php" method="POST">
                    
                    <div class="form-group">
                        <input type="text" name="DESCRIPCION" class="form-control"
                        placeholder="Descripcion del material" autofocus>
                    </div>

                    <div class="form-group">
                        <input type="text" name="UNIDADMEDIDA" class="form-control"
                        placeholder="Unidad de medida">
                    </div>

                    <div class="form-group">
                    <input type="text" name="PRECIO1" class="form-control"  placeholder="$00.00">
                    </div>
                    
                    <input type="submit" class="btn btn-success btn-block"
                    name="saveproducts" value="Enviar"></input>
                </form>
            </div>
        </div>
        <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Descripcion del material</th>
                            <th>Unidad de media</th>
                            <th>Precio</th>
                            <th>Accciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $query = "SELECT * FROM productos";
                        $result_productos=mysqli_query($conn,$query);
                        while($row = mysqli_fetch_array($result_productos)) { ?>
                        <tr>
                            <td>
                                <?php echo $row['DESCRIPCION'] ?>
                            </td>
                            <td>
                                <?php echo $row['UNIDADMEDIDA'] ?>
                            </td>
                            <td>
                                <?php echo $row['PRECIO1'] ?>
                            </td>
                            <td>
                                <a href="editproducts.php?IDMATERIAL=<?php echo $row['IDMATERIAL']?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>  
                                </a>
                                <a href="deleteproducts.php?IDMATERIAL=<?php echo $row['IDMATERIAL']?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>  
                        </tr>
                        <?php } ?>
                    </tbody>
                    
                </table>
        </div>
    </div>
</main>



<?php include("includes/footer.php"); ?>