<?php

extract($_POST);
session_start();
$studentid=$_SESSION['id'];
$con = mysqli_connect('localhost','root','','project');
if($con === false){ 
die("ERROR: Could not connect. " . mysqli_connect_error());
}
$studentid=addslashes($studentid);
$query="select s.name,g.course_id,g.grade from students s ,grades g where s.id=g.student_id and g.student_id='".$studentid."'";
$result=mysqli_query($con,$query);
if($result===false) echo "error";
    ?>

<!DOCTYPE html>
<html>
<head>
    <title>university project</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
      <th scope="col">Name</th>
      <th scope="col">course id</th>
      <th scope="col">grade </th>
    </tr>
        </thead>
        <tbody>
    <?php
while( $row = mysqli_fetch_assoc($result) ){
    echo"<tr><td>", $row['name'],"</td>";
    echo"<td>", $row['course_id'],"</td>";
    echo"<td>", $row['grade'],"</td>";
     echo "</tr>";
   }
?>
</tbody></table></body></html>