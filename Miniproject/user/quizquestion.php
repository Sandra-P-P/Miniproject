<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Fullscreen</title>
    <link rel="fullscreen" href="https://cdnjs.cloudflare.com/ajax/libs/screenfull.js/5.1.0/screenfull.min.js">
    <!-- timer -->
<script>
function countDown(secs,elem) {
 var element = document.getElementById(elem);
 element.innerHTML = " Timer : "+secs+" Minutes";
 if(secs < 1) {
  clearTimeout(timer);
  var f = document.getElementById("form1").submit();
 }
 secs--;
 var timer = setTimeout('countDown('+secs+',"'+elem+'")',60000);
}
</script>

</head>
<body>
</body>
</html>
          
<?php error_reporting (E_ALL ^ E_NOTICE); ?> 
<?php
session_start();
include('includes/header.php');
include('../dbcon.php');
define('page','quizquestion.php');
define('TITLE','question.php');
global $time;
$eid=$_REQUEST['eid'];
$res=mysqli_query($conn,"select time from quiz where eid='$eid'");
while($row=mysqli_fetch_array($res))
{
	$time=$row["time"];
}
$_SESSION["time"]=$time;
?>
<div class="col-sm-9 col-md-9" id="gob">
<script type="text/javascript">
        var btn1 = document.getElementById("gob");
        var btn2 = document.getElementById("exit");
        var el = document.documentElement;
        btn1.addEventListener('click', () => {
            if (el.requestFullscreen) {
                el.requestFullscreen()
            }
        })
         btn2.addEventListener('click', () => {
            if (document.exitFullscreen) {
                document.exitFullscreen()
            }

        })
    </script>

    <div id="status"></div>
<script>
    var time = <?php echo $time; ?>;
countDown(time,"status");</script>
<?php
if($_GET['q']=='quizquestion.php')
{  
    $eid=$_REQUEST['eid'];
    $sql=mysqli_query($conn,"select * from question where eid='$eid' order by RAND()");
    $c=1;
     while($row=mysqli_fetch_array($sql))
     {
         $qns=$row['qns'];
         $qid=$row['id'];
         $total=$_REQUEST['total'];
         $_SESSION['total']=$total;
         
         echo' <form action="result.php?qid='.$qid.'&eid='.$eid.'" onsubmit="result.php?qid='.$qid.'&eid='.$eid.'" method="POST" id="form1">';
         echo '<div class="card">
             <div class="card-header"  style="background-color: #4d8c61;">
                 <h4 style="color:white; font-weight:bold;">'.$c++. '. '.$qns.'</h4>
                 </div>
                 <div class="card-body"  style="background-color: #a4cdb1;">';
                  $sq=mysqli_query($conn,"select * from options where id='$qid' order by RAND()");
                  while($row1=mysqli_fetch_array($sq))
                  {
                    $option=$row1['optn'];
                 //   $qid1=$row1['id'];
                    $optionid=$row1['optionid'];
                    echo ' <input type="radio" name="uid['.$c.']" value="'.$optionid.'" >'.$option.'<br>';
                  }
                 
                 echo'</div>
                 
         </div>';
     }
     echo' </br><button type="submit" id="exit" name="result" class="btn light m-auto d-block" style="color:black;">Submit</button>
   </form> ';
     
}
?>
</div>

<?php
include('includes/footer.php')
?>