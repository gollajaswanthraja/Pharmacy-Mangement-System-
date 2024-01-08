<?php
session_start();
require 'dbcon2.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Item Edit</title>
</head>
<body style="background-color:grey">
  
    <div class="container mt-5">

        <?php include('message2.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Item Edit 
                            <a href="index2.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $item_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM store WHERE id='$item_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $item = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code2.php" method="POST">
                                    <input type="hidden" name="item_id" value="<?= $item['id']; ?>">

                                    <div class="mb-3">
                                        <label>Medicine Name</label>
                                        <input type="text" name="name" value="<?=$item['name'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Exipry Date</label>
                                        <input type="date" name="expiry" value="<?=$item['expiry'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>count</label>
                                        <input type="text" name="count" value="<?=$item['count'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_item" class="btn btn-primary">
                                            Update Item
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
