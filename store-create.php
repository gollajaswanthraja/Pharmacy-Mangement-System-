<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Item Create</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message2.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Item Add 
                            <a href="index2.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code2.php" method="POST">

                            <div class="mb-3">
                                <label>Medicine Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Expiry Date</label>
                                <input type="date" name="expiry" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>count</label>
                                <input type="text" name="count" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_item" class="btn btn-primary">Save Item</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
