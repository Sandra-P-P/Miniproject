
<?php
// create db connection
$conn=new mysqli("localhost","root","","exam");//mini
if($conn->connect_error) {
    die("connection failed");
   }

?>