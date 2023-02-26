<?php
extract($_POST);
$con = mysqli_connect('localhost','root','','project');
if($con === false){ 
die("ERROR: Could not connect. " . mysqli_connect_error());
}
$studentid = addslashes($studentid);
$studentname=addslashes($studentname);
$studentemail = addslashes($studentemail);

$iquery ="insert into students values('".$studentid."','".$studentname."','".$studentemail."')";
$result = mysqli_query($con,$iquery);
if($result===false){
echo"Error nothing is inserted";
}else echo "successfully inserted";
?>