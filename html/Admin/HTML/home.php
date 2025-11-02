<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>

<a href="students.php">Students</a>
<!-- Courses List -->
<table>
    <tr>
        <th>ID</th>
        <th>Course Name</th>
        <th>Lecturer</th>
        <th>Action</th>
    </tr>

    <?php
    include("../../Shared/get_available_courses.php");
    $result = getAvailableCourses();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["course_id"] . "</td>";
            echo "<td>" . $row["course_name"] . "</td>";
            echo "<td>" . $row["lecturer"] . "</td>";
            echo "<td>
                    <form method='POST' action='../PHP/delete_course.php'>
                        <input type='hidden' name='course_id' value='" . $row["course_id"] . "'>
                        <button type='submit'>Delete Course</button>
                    </form>
                  </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No courses found.</td></tr>";
    }
    ?>
</table>

<h2>Create New Course</h2>
<form method='POST' action='../PHP/create_course.php' onsubmit="setTimeout(() => window.location.reload(), 100);">
    <input type="text" name="course_name" placeholder="Course Name"><br>
    <input type="text" name="lecturer" placeholder="Lecturer"><br>
    <input type="submit" id="create_course_submit" value="Create Course">
</form>
</body>
