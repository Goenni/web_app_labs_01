<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Course Management</title>
    <link rel="stylesheet" href="../../styles.css">
</head>
<body>
<!-- Header -->
<header>
    <h1>Admin Dashboard</h1>
</header>

<!-- Navigation -->
<nav>
    <a href="manage_registrations.php">Manage Registrations</a>
    <a href="students.php">Students</a>
    <a href="../../Shared/logout.php">Logout</a>
</nav>

<!-- Main Content -->
<div class="container">
    <!-- Courses Section -->
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
            include("../../Shared/get_available_courses.php");
            $result = getAvailableCourses();
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["course_id"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["course_name"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["lecturer"]) . "</td>";
                    echo "<td>
                                    <form method='POST' action='../PHP/delete_course.php' style='display:inline;'>
                                        <input type='hidden' name='course_id' value='" . htmlspecialchars($row["course_id"]) . "'>
                                        <button type='submit' class='btn-delete'>Delete</button>
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

    <!-- Create Course Section -->
    <section class="create-course-section">
        <h2>Create New Course</h2>
        <form method='POST' action='../PHP/create_course.php' onsubmit="setTimeout(() => window.location.reload(), 100);">
            <input type="text" name="course_name" placeholder="Course Name" required>
            <input type="text" name="lecturer" placeholder="Lecturer" required>
            <button type="submit" class="btn-primary">Create Course</button>
        </form>
    </section>
</div>

<!-- Footer -->
<footer>
    <p>&copy; 2025 Admin Dashboard. All rights reserved.</p>
</footer>
</body>
</html>