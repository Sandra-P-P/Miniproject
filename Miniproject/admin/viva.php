<?php
ob_start();
define('TITLE','viva.php');
define('page','viva.php');
include_once('../dbcon.php');
session_start();
include('includes/header.php');
$email= $_SESSION['remail'];
$subject=$_SESSION['rsubject'];
if(!isset($_SESSION['radmin']))
{
    header("location:adminlogin.php");
}

if(isset($_REQUEST['submit']))
{
$title=$_REQUEST['Title'];
$total=$_REQUEST['question'];
$_SESSION['qns']=$total;
$time=$_REQUEST['time'];
$eid=uniqid();
$_SESSION['eid']=$eid;
echo '$eid';
if($title=='' || $time=='')
{
    $msg="all fields are required";
}
else{
$sql="insert into viva values ('$eid ','$title','$total','$time',now(),'$email','$subject')";

if($conn->query($sql) == TRUE)
                   {
                   $msg="done successfully";
                   header("location:addvivaquestions.php");
                   }
                   else{
                     $msg="Unable to insertion";
                   }
     }
}
ob_end_flush();
?>

</script>
<div class="offset-md-1 offset-sm-2 col-sm-6 col-md-7" id="gob">
    <h2 class="text-center mr-5 pr-5" style="color: white; font-weight: bold;">Enter Viva Details</h2>
    <form action="" method="POST" class="text-center" id="myForm">
        <div class="form-group">
            <input type="text" placeholder="Enter the title" class="form-control" name="Title" require>
        </div>
        <div class="form-group">
            <input type="number" class="form-control" placeholder="Enter the number of questions" name="question" require>
        </div>
        <div class="form-group">
            <input type="number" class="form-control" placeholder="Enter the time limit" name="time"><br>
        </div>
        <button type="submit" class="btn btn-light" name="submit" style="color: black;">Submit</button>
        <p class="alert"><?php if(isset($msg)) echo $msg ?></p>
    </form>
</div>
<?php
include('includes/footer.php');
?>
