<?php
$con = mysqli_connect('localhost', 'root', '', 'project');
if ($con === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
function GradeStudentTeacher($teacher_id)
{
    $con = mysqli_connect('localhost', 'root', '', 'project');
    if ($con === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    $squery = "select * from grades where course_id in  (select id from courses where teacher_id=$teacher_id);";
    $students=[];
    $result = mysqli_query($con, $squery);
    if ($result == true) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($students, $row);
        }
    }
    return $students;
}
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
                <th scope="col">Grade</th>
            </tr>
        </thead>
        <tbody>
            <?php
            session_start();
            $t_id = $_SESSION['id'];
            $students = GradeStudentTeacher($t_id);
            foreach ($students as $val) {
                echo "<tr>";
                foreach ($val as $k => $vv) {
                    if ($k == "grade") {
                        echo "<td>";
                        echo "<form method='post' action='' >";
                        echo " <input type='text' class='inputgrade'name='grade' value=$val[grade]>
                             <input type='hidden'value=$val[student_id] name='studentid'>
                             <input type='hidden' value=$val[course_id] name='courseid'>";
                        echo " <input type='submit' class='btn btn-info btn-md' value='Insert' name='insert'>";
                        echo "</form></td>";
                    } else {
                        echo "<td>$vv</td>";
                    }
                }
                echo "</tr>";
            }
            if ((!empty($_POST['insert'])) && (!empty($_POST['grade']))) {
                $iQuery = "update grades set grade='" . $_POST['grade'] . "' where student_id='" . $_POST['studentid'] . "' and course_id='" . $_POST['courseid'] . "'";
                $selResult = mysqli_query($con, $iQuery);
                if ($selResult == true) {
                    echo "Successfully inserted";
                    header("Refresh:0");
                }
            }
             ?>