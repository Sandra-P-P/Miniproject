<?php
include_once '../dbcon.php';
session_start();
// if(!isset($_SESSION['ruser']))
// {
//     header("location:login.php");
// }
// //delete notification
// if(isset($_GET['id']))
// {
//   $id=$_GET['id'];
//   $sql=mysqli_query($conn,"Delete from meeting where id='$id'");
//   header("location:umeeting.php");
// }
if(isset($_GET['id']))
{
  $fid=$_GET['id'];
  $sql=mysqli_query($conn,"select * from meeting where id='$fid'");
while($row=mysqli_fetch_array($sql))
{
  $meeting_title=$row['meeting_title'];
  $date=$row['date'];
  $name=$row['name'];
  $link=$row['link'];
echo'<div class="container mt-4" style="width:90%";> 
  <div class="card">
  <div class="card-header bg-dark text-center text-white font-weight-bold"><h4>Faculty Name: '.$name.'</h4></div>
  <div class="card-title text-center text-danger"><h5>Date of publish: '.$date.'</h5></div>
  <div class="card-title text-center text-primary"><p class="font-weight-bold">Notice title: '.$meeting_title.'</p></div>
  <div class="card-title text-center text-secondary"><p>Details: '.$link.'</p></div>
</div>
</div>';
/////////////////////////////////////////////////////////////////////////////////////
}
}
?>