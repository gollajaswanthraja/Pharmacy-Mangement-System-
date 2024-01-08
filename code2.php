<?php
session_start();
require 'dbcon2.php';

if(isset($_POST['delete_item']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_item']);

    $query = "DELETE FROM store WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message2'] = "Item Deleted Successfully";
        header("Location: index2.php");
        exit(0);
    }
    else
    {
        $_SESSION['message2'] = "Item Not Deleted";
        header("Location: index2.php");
        exit(0);
    }
}

if(isset($_POST['update_item']))
{
    $item_id = mysqli_real_escape_string($con, $_POST['item_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $expiry = mysqli_real_escape_string($con, $_POST['expiry']);
    $count = mysqli_real_escape_string($con, $_POST['count']);
   // $course = mysqli_real_escape_string($con, $_POST['course']);

    $query = "UPDATE store SET name='$name', expiry='$expiry', count='$count' WHERE id='$item_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message2'] = "Item Updated Successfully";
        header("Location: index2.php");
        exit(0);
    }
    else
    {
        $_SESSION['message2'] = "Item Not Updated";
        header("Location: index2.php");
        exit(0);
    }

}


if(isset($_POST['save_item']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $expiry = mysqli_real_escape_string($con, $_POST['expiry']);
    $count = mysqli_real_escape_string($con, $_POST['count']);
   // $course = mysqli_real_escape_string($con, $_POST['course']);

    $query = "INSERT INTO store (name,expiry,count) VALUES ('$name','$expiry','$count')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message2'] = "Item Added Successfully";
        header("Location: store-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message2'] = "Item Not Added";
        header("Location: sales-create.php");
        exit(0);
    }
}

?>