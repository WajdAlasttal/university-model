<?php

extract($_POST);
$con = mysqli_connect('localhost', 'root', '', 'project');
if ($con === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$grade = addslashes($grade);
$query = "select s.name,g.course_id from students s ,grades g where s.id=g.student_id and g.grade='" . $grade . "'";
$result = mysqli_query($con, $query);
if ($result === false) echo "error";
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
      <th scope="col">course</th>
    </tr>
        </thead>
        <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>", $row['name'], "</td>";
                    echo "<td>", $row['course_id'], "</td>";
                    echo "</tr>";
                }
                ?>
        </tbody>
    </table></body></html>