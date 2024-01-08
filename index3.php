<?php
    if(isset($_SESSION['message3'])) :
?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hey!</strong> <?= $_SESSION['message3']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php 
    unset($_SESSION['message3']);
    endif;
?>




<?php
    session_start();
    require 'dbcon3.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Supplier CRUD</title>
</head>
<body>
  
    <div class="container mt-4">

        <?php include('message3.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Supplier Details
                            <a href="2.html" class="btn btn-primary float-end">Back</a>
                            <a href="supplier-create.php" class="btn btn-primary float-end">ADD Supplier</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.NO</th>
                                    <th>Medicine Name</th>
                                    <th>Supplier Name</th>
                                    <th>Supply Date</th>
                                    <th>Supplier ph.No</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM supplier";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $supplier)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $supplier['id']; ?></td>
                                                <td><?= $supplier['mname']; ?></td>
                                                <td><?= $supplier['sname']; ?></td>
                                                <td><?= $supplier['sdate']; ?></td>
                                                <td><?= $supplier['sphone']; ?></td>
                                                <td>
                                                    <a href="supplier-view.php?id=<?= $supplier['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <a href="supplier-edit.php?id=<?= $supplier['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="code3.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_supplier" value="<?=$supplier['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
