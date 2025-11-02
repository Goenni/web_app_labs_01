<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>
<body>
    <h1>Students</h1>
    <table>
        <tr>
            <th>Student ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
        </tr>

        <?php
        include("../PHP/get_students.php");
        $result = getStudents();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["student_id"] . "</td>";
                echo "<td>" . $row["firstname"] . "</td>";
                echo "<td>" . $row["lastname"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No students found.</td></tr>";
        }
        ?>
    </table>
