<?php
session_start();
require 'dbcon4.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">-->

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Customer Edit</title>
</head>
<body style="background-color:beige">
  
    <div class="container mt-5">

        <?php include('message4.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Details Edit 
                            <a href="index4.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $customer_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM customer WHERE id='$customer_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $customer = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code4.php" method="POST">
                                    <input type="hidden" name="customer_id" value="<?= $customer['id']; ?>">

                                    <div class="mb-3">
                                        <label>Medicine Name</label>
                                        <input type="text" name="mname" value="<?=$customer['mname'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Customer Name</label>
                                        <input type="text" name="cname" value="<?=$customer['cname'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Purshase Date</label>
                                        <input type="text" name="cdate" value="<?=$customer['cdate'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Customer Phone No</label>
                                        <input type="text" name="cphone" value="<?=$customer['cphone'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_customer" class="btn btn-primary">
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
