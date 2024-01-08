<?php
    if(isset($_SESSION['message4'])) :
?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hey!</strong> <?= $_SESSION['message4']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php 
    unset($_SESSION['message4']);
    endif;
?>




<?php
    session_start();
    require 'dbcon4.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Customer CRUD</title>
    <style>
        body{
    background-image:url('pic5.jpg');
    background-position: fixed;
    background-repeat:no-repeat;
    background-size:1950px;
}
    </style>
</head>
<body>
  
    <div class="container mt-4">

        <?php include('message4.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Customer Details
                            <a href="2.html" class="btn btn-primary float-end">Back</a>
                            <a href="customer-create.php" class="btn btn-primary float-end">ADD Customer</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.NO</th>
                                    <th>Medicine Name</th>
                                    <th>Customer Name</th>
                                    <th>Customer Date</th>
                                    <th>Customer ph.No</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM customer";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $customer)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $customer['id']; ?></td>
                                                <td><?= $customer['mname']; ?></td>
                                                <td><?= $customer['cname']; ?></td>
                                                <td><?= $customer['cdate']; ?></td>
                                                <td><?= $customer['cphone']; ?></td>
                                                <td>
                                                    <a href="customer-view.php?id=<?= $customer['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <a href="customer-edit.php?id=<?= $customer['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="code4.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_customer" value="<?=$customer['id'];?>" class="btn btn-danger btn-sm">Delete</button>
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
