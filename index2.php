<?php
    if(isset($_SESSION['message2'])) :
?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hey!</strong> <?= $_SESSION['message2']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php 
    unset($_SESSION['message2']);
    endif;
?>




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

    <title>Store CRUD</title>
    <link rel="stylesheet" href="1.css">
</head>
<body>
  
    <div class="container mt-4">

        <?php include('message2.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Store Details
                            <a href="2.html" class="btn btn-danger float-end">BACK</a>
                            <a href="store-create.php" class="btn btn-primary float-end">Add Items</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.no</th>
                                    <th>Medicine Name</th>
                                    <th>expiry</th>
                                    <th>count</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM store";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $item)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $item['id']; ?></td>
                                                <td><?= $item['name']; ?></td>
                                                <td><?= $item['expiry']; ?></td>
                                                <td><?= $item['count']; ?></td>
                                                <td>
                                                    <a href="store-view.php?id=<?= $item['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <a href="store-edit.php?id=<?= $item['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="code2.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_item" value="<?=$item['id'];?>" class="btn btn-danger btn-sm">Delete</button>
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
