<?php
session_start();
require 'dbcon4.php';

if(isset($_POST['delete_customer']))
{
    $customer_id = mysqli_real_escape_string($con, $_POST['delete_customer']);

    $query = "DELETE FROM customer WHERE id='$customer_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message4'] = "Customer Details Deleted Successfully";
        header("Location: index4.php");
        exit(0);
    }
    else
    {
        $_SESSION['message3'] = "Customer Not Deleted";
        header("Location: index4.php");
        exit(0);
    }
}

if(isset($_POST['update_customer']))
{
    $customer_id = mysqli_real_escape_string($con, $_POST['customer_id']);

    $mname = mysqli_real_escape_string($con, $_POST['mname']);
    $cname = mysqli_real_escape_string($con, $_POST['cname']);
    $cdate = mysqli_real_escape_string($con, $_POST['cdate']);
    $cphone = mysqli_real_escape_string($con, $_POST['cphone']);

    $query = "UPDATE customer SET mname='$mname', cname='$cname', cdate='$cdate', cphone='$cphone' WHERE id='$customer_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message4'] = "Customer Details Updated Successfully";
        header("Location: index4.php");
        exit(0);
    }
    else
    {
        $_SESSION['message4'] = "Customer Details Not Updated";
        header("Location: index4.php");
        exit(0);
    }

}


if(isset($_POST['save_customer']))
{
    $mname = mysqli_real_escape_string($con, $_POST['mname']);
    $cname = mysqli_real_escape_string($con, $_POST['cname']);
    $cdate = mysqli_real_escape_string($con, $_POST['cdate']);
    $cphone = mysqli_real_escape_string($con, $_POST['cphone']);

    $query = "INSERT INTO customer (mname,cname,cdate,cphone) VALUES ('$mname','$cname','$cdate','$cphone')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message4'] = "Customer Details Created Successfully";
        header("Location: customer-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message4'] = "Customer Details Not Created";
        header("Location: customer-create.php");
        exit(0);
    }
}

?>