<?php
include_once '../dbcon.php';
session_start();
if(!isset($_SESSION['ruser']))
{
    header("location:login.php");
}
//delete notification

if(isset($_GET['id']))
{
  $id=$_GET['id'];
  $sql=mysqli_query($conn,"Delete from notification where id='$id'");
  header("location:unotification.php");
}
?>
