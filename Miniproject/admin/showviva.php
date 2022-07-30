<?php
define('TITLE','showviva.php');
define('page','showviva.php');
include_once('../dbcon.php');
session_start(); 
$email= $_SESSION['remail'];
$subject=$_SESSION['rsubject'];
if(!isset($_SESSION['radmin']))
{
    header("location:adminlogin.php");
} 
include('includes/header.php');

 echo' <div class="col-sm-9 col-md-10" id="gob">
 <p class="p-2 text-white text-center " style="background-color: rgba(0, 0, 0, 0.6);">List of Vivas</p>';
$sql="select * from viva where email='$email' and subject='$subject'";
$result=$conn->query($sql);
if($result->num_rows>0)
{
    echo '<table class="table"  style="color:white; background-color: rgba(0, 0, 0, 0.4);">
    <tbody>
    <tr>
    <th>No</th>
    <th>Viva</th>
     <th>Total question</th>
    <th>Time limit</th>
    <th>Action</th>
    </tr>';
    $c=1;
    while($row=$result->fetch_assoc())
    {
        $eid=$row['eid'];
        $total=$row['total'];
    echo '<tr>
    <td>'.$c++.'</td>
    <td>'.$row["title"].'</td>
     <td class="pl-5">'.$row["total"].'</td>
     <td>'.$row["time"].' min</td>
    <td><a class="btn btn-secondary" href="vivaquestion.php?q=vivaquestion.php&eid='.$eid.'&total='.$total.'">Preview</a>
    <a class="btn btn-secondary mt-1" href="update.php?q=deletevivaqns&eid='.$eid.'"><i class="fas fa-trash"></i></a></td>
    </tr>';
    }
   echo' <tbody> </table>';
}
?>
</div>


<?php
include('includes/footer.php');
?>