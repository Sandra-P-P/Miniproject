<?php
define('TITLE','meeting.php');
define('page','meeting.php');
include_once('../dbcon.php');
session_start();
include('includes/header.php');
?>

<?php
echo'
<!DOCTYPE html>
<html lang="en">
<head>
  <script src="https://meet.jit.si/external_api.js"></script>
</head>
<body>
<div style="text-align:center";>
    <h2>INSTRUCTIONS TO BE FOLLOWED.</h2>
    <BR>

   <h6>1.  All questions are compulsory.</h5>
   <h6>2.  You are allowed to submit only once, make sure that you have correctly attempted all the questions before submission.</h5>
   <h6>3.  Make sure you clicked on the submit button to successfully complete the test before the timer goes out , else the scored wont be saved.</h5>
   <h6>4.  You must start recording before attempting the test.</h5>
   <h6>5.  If you face any difficulties while appearing the test please contact the respective faculty.</h5>
   <BR>
   <BR>
   <BR>
   <BR>
    <button id="start" type="button" class="btn light m-auto d-block"  style="color:black; font-weight:30px;" >Click to record</button>
   <BR>
   <div id="jitsi-container" class="center" >
</div>
   <BR>
</div>


<script>
var button = document.querySelector("#start");
var container = document.querySelector("#jitsi-container");
var api = null;

button.addEventListener("click", () => {
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    var stringLength = 30;

    function pickRandom() {
    return possible[Math.floor(Math.random() * possible.length)];
    }
var randomString = Array.apply(null, Array(stringLength)).map(pickRandom).join("");

    var domain = "meet.jit.si";
    var options = {
        "roomName": randomString,
        "parentNode": container,
        "width": 600,
        "height": 600,
    };
    api = new JitsiMeetExternalAPI(domain, options);
});

</script>
</body>
</html>';
if($_GET['q']=='instructionquiz.php')
{  
    $eid=$_REQUEST['eid'];
    $sql=mysqli_query($conn,"select * from quiz where eid='$eid'");
    $c=1;
     while($row=mysqli_fetch_array($sql))
     {
        $eid=$row['eid'];
         $total=$row['total'];
         
           echo' <div style="text-align:center;"><a class="btn light m-auto d-block" target="_blank" style="color:black;" type="button" href="quizquestion.php?q=quizquestion.php&eid='.$eid.'&total='.$total.'">
         <button id="start" type="button" class="btn light m-auto d-block" style="color:black; font-weight:30px; text-align:center;" >Start test</button>
         </a></div>';
     }

}
if($_GET['q']=='instruction.php')
{  
    $eid=$_REQUEST['eid'];
    $sql=mysqli_query($conn,"select * from viva where eid='$eid'");
    $c=1;
     while($row=mysqli_fetch_array($sql))
     {
        $eid=$row['eid'];
         $total=$row['total'];
         
         echo' <div style="text-align:center;"><a class="btn light m-auto d-block" target="_blank" style="color:black;" type="button" href="vivaquestion.php?q=vivaquestion.php&eid='.$eid.'&total='.$total.'">
         <button id="start" type="button" class="btn light m-auto d-block" style="color:black; font-weight:30px; text-align:center;" >Start test</button>
         </a></div>';
        
     }

    }
?>
       
    </form></div>
</div>

