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

    <title>Supplier Edit</title>
</head>
<body style="background-color:lightblue">
  
    <div class="container mt-5">

        <?php include('message3.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Supplier Edit 
                            <a href="index3.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $supplier_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM supplier WHERE id='$supplier_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $supplier = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code3.php" method="POST">
                                    <input type="hidden" name="supplier_id" value="<?= $supplier['id']; ?>">

                                    <div class="mb-3">
                                        <label>Medicine Name</label>
                                        <input type="text" name="mname" value="<?=$supplier['mname'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Supplier Name</label>
                                        <input type="text" name="sname" value="<?=$supplier['sname'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Supply Date</label>
                                        <input type="text" name="sdate" value="<?=$supplier['sdate'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Supplier Phone No</label>
                                        <input type="text" name="sphone" value="<?=$supplier['sphone'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_supplier" class="btn btn-primary">
                                            Update Details
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
