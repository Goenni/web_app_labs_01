<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register for Course</title>
    <link rel="stylesheet" href="../../styles.css">
</head>
<body>
<!-- Header -->
<header>
    <h1>Course Registration</h1>
</header>

<!-- Navigation -->
<nav>
    <a href="home.php">Home</a>
</nav>

<!-- Main Content -->
<div class="container">
    <section class="courses-section">
        <h2>Available Courses</h2>

        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Course Name</th>
                <th>Lecturer</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            include "../../Shared/get_available_courses.php";
            $result = getAvailableCourses();
            $student_id = $_SESSION['student_id'];
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["course_id"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["course_name"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["lecturer"]) . "</td>";
                    echo "<td>
                                    <form method='POST' action='../PHP/course_register.php' style='display:inline;'>
                                        <input type='hidden' name='course_id' value='" . htmlspecialchars($row["course_id"]) . "'>
                                        <input type='hidden' name='student_id' value='$student_id'>
                                        <button type='submit' class='btn-register'>Register</button>
                                    </form>
                                  </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4' style='text-align:center;'>No courses found.</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </section>
</div>

<!-- Footer -->
<footer>
    <p>&copy; 2025 Student Portal. All rights reserved.</p>
</footer>
</body>
</html>