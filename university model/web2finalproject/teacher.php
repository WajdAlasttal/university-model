<?php
extract($_POST);
$con = mysqli_connect('localhost','root','','project');
if($con === false){ 
die("ERROR: Could not connect. " . mysqli_connect_error());
}
$teacherid=addslashes($teacherid);
$teachername=addslashes($teachername);
$iquery ="insert into teachers values('".$teacherid."','".$teachername."')";
$result = mysqli_query($con,$iquery);
if($result===false){
echo"Error nothing is inserted";
}else echo "successfully inserted";
?>