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
                <legend>Agregar cliente</legend>
                <form action="saveclientes.php" method="POST">
                    
                    <div class="form-group">
                        <input type="text" name="RAZON_SOCIAL" class="form-control"
                        placeholder="Razon Social" autofocus>
                    </div>

                    <div class="form-group">
                        <input type="text" name="RFC" class="form-control"
                        placeholder="RFC">
                    </div>

                    <input type="submit" class="btn btn-success btn-block"
                    name="saveclientes" value="Agregar"></input>
                </form>
            </div>
        </div>
        <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Razón social</th>
                            <th>RFC</th>
                            <th>Accciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $query = "SELECT * FROM clientes";
                        $result_clientes=mysqli_query($conn,$query);
                        while($row = mysqli_fetch_array($result_clientes)) { ?>
                        <tr>
                            <td>
                                <?php echo $row['RAZON_SOCIAL'] ?>
                            </td>
                            <td>
                                <?php echo $row['RFC'] ?>
                            </td>
                            <td>
                                <a href="editclientes.php?IDCLIENTE=<?php echo $row['IDCLIENTE']?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>  
                                </a>
                                <a href="deleteclientes.php?IDCLIENTE=<?php echo $row['IDCLIENTE']?>" class="btn btn-danger">
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