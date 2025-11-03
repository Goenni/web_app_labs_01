<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../../styles.css">
</head>
<body>
<!-- Profile Section -->
<nav>
<div id="profile">
    <img id="user_icon" src="../../Shared/user-profile.webp" alt="Profile Picture" title="Edit Profile">
    <span id="greeting">Hello, <?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?></span>
</div>
    <a href="course_register.php">Register for new courses</a>
    <a href="update_information.php">Edit Information</a>
</nav>

<!-- Courses List Table -->
<section class="courses-section">
    <h2>Your Courses</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Course Name</th>
            <th>Lecturer</th>
            <th>Action</th>
        </tr>
        <?php
        include("../PHP/get_courses.php");
        $student_id = $_SESSION['student_id'];
        $result = getStudentsCourses();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["course_id"] . "</td>";
                echo "<td>" . $row["course_name"] . "</td>";
                echo "<td>" . $row["lecturer"] . "</td>";
                echo "<td>
                            <form method='POST' action='../PHP/drop_course.php'>
                                <input type='hidden' name='course_id' value='" . $row["course_id"] . "'>
                                <input type='hidden' name='student_id' value='$student_id'>
                                <button type='submit' class='btn-delete'>Drop Course</button>
                            </form>
                          </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No courses found.</td></tr>";
        }
        ?>
    </table>
</section>

</body>
</html>
