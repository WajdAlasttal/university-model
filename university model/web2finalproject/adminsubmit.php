<?php
extract($_POST);
$con = mysqli_connect('localhost','root','','project');
if($con === false){ 
die("ERROR: Could not connect. " . mysqli_connect_error());
}
//preventing code injection
$userid=addslashes($userid);
$password=addslashes($password);
if(isset($_POST['submit'])){
    session_start();
   $_SESSION['id'] =$userid;
   print_r($_SESSION);
}


$squery="select * from paswrd where userid= $userid and password= $password";
$result = mysqli_query($con,$squery);
$row =mysqli_fetch_array($result);
if(!(strcmp($row['userid'],$userid))&&(!(strcmp($row['password'],$password)))&&(!(strcmp($row['type'],'clacker')))){
    header('location: homePage.html');
}else if(!(strcmp($row['userid'],$userid))&&(!(strcmp($row['password'],$password)))&&(!(strcmp($row['type'],'admin')))){
    header('location: course.html');
}else if(!(strcmp($row['userid'],$userid))&&(!(strcmp($row['password'],$password)))&&(!(strcmp($row['type'],'teacher')))){
    header('location: grades.php');
}else if(!(strcmp($row['userid'],$userid))&&(!(strcmp($row['password'],$password)))&&(!(strcmp($row['type'],'student')))){
    header('location: studentView.php');
}else{
    echo "Invalid user";
}
?>