<?php
require 'dbcon.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Medicine View</title>
</head>
<body style="background-color:pink">

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Medicine View Details 
                            <a href="index1.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $med_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM medicine WHERE id='$med_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $med = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>Medicine Name</label>
                                        <p class="form-control">
                                            <?=$med['name'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Medicine Type</label>
                                        <p class="form-control">
                                            <?=$med['type1'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Cost</label>
                                        <p class="form-control">
                                            <?=$med['cost'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Tablets per pack</label>
                                        <p class="form-control">
                                            <?=$med['per'];?>
                                        </p>
                                    </div>

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