<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_medicine']))
{
    $medicine_id = mysqli_real_escape_string($con, $_POST['delete_medicine']);

    $query = "DELETE FROM medicine WHERE id='$medicine_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Medicine Deleted Successfully";
        header("Location: index1.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Medicine Not Deleted";
        header("Location: index1.php");
        exit(0);
    }
}

if(isset($_POST['update_medicine']))
{
    $medicine_id = mysqli_real_escape_string($con, $_POST['medicine_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $type1 = mysqli_real_escape_string($con, $_POST['type1']);
    $cost = mysqli_real_escape_string($con, $_POST['cost']);
    $per = mysqli_real_escape_string($con, $_POST['per']);

    $query = "UPDATE medicine SET name='$name', type1='$type1', cost='$cost', per='$per' WHERE id='$medicine_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Medicine Updated Successfully";
        header("Location: index1.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Medicine Not Updated";
        header("Location: index1.php");
        exit(0);
    }

}


if(isset($_POST['save_medicine']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $type1 = mysqli_real_escape_string($con, $_POST['type1']);
    $cost = mysqli_real_escape_string($con, $_POST['cost']);
    $per = mysqli_real_escape_string($con, $_POST['per']);

    $query = "INSERT INTO medicine (name,type1,cost,per) VALUES ('$name','$type1','$cost','$per')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Medicine Created Successfully";
        header("Location: med-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Medicine Not Created";
        header("Location: med-create.php");
        exit(0);
    }
}

?>