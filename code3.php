<?php
session_start();
require 'dbcon3.php';

if(isset($_POST['delete_supplier']))
{
    $supplier_id = mysqli_real_escape_string($con, $_POST['delete_supplier']);

    $query = "DELETE FROM supplier WHERE id='$supplier_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message3'] = "Supplier Deleted Successfully";
        header("Location: index3.php");
        exit(0);
    }
    else
    {
        $_SESSION['message3'] = "Supplier Not Deleted";
        header("Location: index3.php");
        exit(0);
    }
}

if(isset($_POST['update_supplier']))
{
    $supplier_id = mysqli_real_escape_string($con, $_POST['supplier_id']);

    $mname = mysqli_real_escape_string($con, $_POST['mname']);
    $sname = mysqli_real_escape_string($con, $_POST['sname']);
    $sdate = mysqli_real_escape_string($con, $_POST['sdate']);
    $sphone = mysqli_real_escape_string($con, $_POST['sphone']);

    $query = "UPDATE supplier SET mname='$mname', sname='$sname', sdate='$sdate', sphone='$sphone' WHERE id='$supplier_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message3'] = "Supplier Details Updated Successfully";
        header("Location: index3.php");
        exit(0);
    }
    else
    {
        $_SESSION['message3'] = "Supplier Details  Not Updated";
        header("Location: index3.php");
        exit(0);
    }

}


if(isset($_POST['save_supplier']))
{
    $mname = mysqli_real_escape_string($con, $_POST['mname']);
    $sname = mysqli_real_escape_string($con, $_POST['sname']);
    $sdate = mysqli_real_escape_string($con, $_POST['sdate']);
    $sphone = mysqli_real_escape_string($con, $_POST['sphone']);

    $query = "INSERT INTO supplier (mname,sname,sdate,sphone) VALUES ('$mname','$sname','$sdate','$sphone')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message3'] = "Supplier Created Successfully";
        header("Location: supplier-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message3'] = "Supplier Not Created";
        header("Location: supplier-create.php");
        exit(0);
    }
}

?>