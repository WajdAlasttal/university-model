<?php
extract($_POST);
$con = mysqli_connect('localhost','root','','project');
if($con === false){ 
die("ERROR: Could not connect. ". mysqli_connect_error());
}
$squery="select id from teachers where id='".$teacherid."'";
$sresult=mysqli_query($con,$squery);
$query = "select id from courses where id ='" . $courseid . "'";
$res = mysqli_query($con, $query);
if($sresult==false ){
    echo "Error";  
}else{
    if (mysqli_num_rows($sresult) > 0 && !(mysqli_num_rows($res) > 0)) {
        $courseid = addslashes($courseid);
        $coursename=addslashes($coursename);
        $teacherid = addslashes($teacherid);
    $iquery ="insert into courses values('".$courseid."','".$coursename."','".$teacherid."')";
    $iresult = mysqli_query($con,$iquery);
    echo " Successfully inserted....";
    }else if (!(mysqli_num_rows($sresult) > 0)){
        echo "invalid teacher";
    }else if (mysqli_num_rows($res) > 0) {
        echo "The Course Already Exist";
    }
}
