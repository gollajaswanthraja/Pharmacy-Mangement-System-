<?php
    if(isset($_SESSION['message'])) :
?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hey!</strong> <?= $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php 
    unset($_SESSION['message']);
    endif;
?>


<!--Step 4: Create a file named index.php and fetch data from database as given below code:-->

<?php
    session_start();
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

    <title>MEDICINE CRUD</title>
</head>
<body style="background-color:beige">
  
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Medicine Details
                            <a href="2.html" class="btn btn-danger float-end">BACK</a>
                          <!--  <a href="med-create.php" class="btn btn-primary float-end">ADD MEDICINE</a>-->
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.NO</th>
                                    <th>Medicine Name</th>
                                    <th>Medicine Type</th>
                                    <th>Cost</th>
                                    <th>Tablets per pack</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM medicine";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $med)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $med['id']; ?></td>
                                                <td><?= $med['name']; ?></td>
                                                <td><?= $med['type1']; ?></td>
                                                <td><?= $med['cost']; ?></td>
                                                <td><?= $med['per']; ?></td>
                                                <td>
                                                 <!--   <a href="med-view.php?id=<?= $med['id']; ?>" class="btn btn-info btn-sm">View</a>-->
                                                    <a href="med-edit.php?id=<?= $med['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_medicine" value="<?=$med['id'];?>" class="btn btn-danger btn-sm">Delete</button>
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
