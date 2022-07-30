<?php
session_start(); 
define('TITLE','addviva');
define('page','addviva');
include('includes/header.php');
include_once('../dbcon.php');
if(!isset($_SESSION['radmin']))
{
    header("location:adminlogin.php");
}
// include('includes/header.php');
  echo'  <div class="offset-md-1 offset-sm-2 col-sm-6 col-md-6" id="gob">
    <h2 class="text-center" style="color:white; font-weight:bold; " >Enter question:</h2>
     <form action="update.php?q=vivaadding" method="POST">';

        $n=$_SESSION['qns'];
        for($i=1; $i<=$n; $i++)
        {
       echo '<b style="color:white;">Question no:'.$i.'</b>';

    echo ' <textarea name="qns'.$i.'" id="qns" class="form-control" placeholder="Enter your question"></textarea><br>';
     
    }
    ?>
 <div class="submit">
     <button type="submit" class="btn btn-light my-3 ml-5" name='addviva' style="color: black;">submit</button>
 </div>
</form>
 </div>

 <?php
include('includes/footer.php');
?>
