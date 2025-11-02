<?php
include("../PHP/get_courses.php");
session_start();
$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$student_id = $_SESSION['student_id']; // Make sure this is set in your login
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>
<div id="profile">
    <img id="user_icon" src="../../Shared/user-profile.webp" alt="profile picture" title="Edit Profile">
    <span id="greeting">Hello, <?php echo $firstname . " " . $lastname; ?></span>
</div>

<!-- Courses List -->
<table>
    <tr>
        <th>ID</th>
        <th>Course Name</th>
        <th>Lecturer</th>
        <th>Action</th>
    </tr>

    <?php
    $result = getStudentsCourses();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["course_id"] . "</td>";
            echo "<td>" . $row["course_name"] . "</td>";
            echo "<td>" . $row["lecturer"] . "</td>";
            echo "<td>
                    <form method='POST' action='drop_course.php'>
                        <input type='hidden' name='course_id' value='" . $row["course_id"] . "'>
                        <button type='submit'>Drop Course</button>
                    </form>
                  </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No courses found.</td></tr>";
    }
    ?>
</table>

<!-- Popup HTML -->
<div id="popup" class="register">
    <div class="register-popup-content">
        <span class="close" onclick="closePopup()">&times;</span>
        <form method="POST" action="../PHP/update_student.php" id="studentForm">
            <input type="hidden" name="student_id" id="student_id">
            <input type="text" name="firstname" id="firstname" placeholder="First Name" required>
            <input type="text" name="lastname" id="lastname" placeholder="Last Name" required>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <input type="submit" value="Submit" id="register_submit">
        </form>
        <script>
            document.getElementById("register_submit").addEventListener("submit", function(e) {
                e.preventDefault();
                closePopup();
            });
        </script>
    </div>
</div>

<script>
    document.getElementById("user_icon").addEventListener("click", function() {
        openStudentPopup(<?php echo $student_id; ?>);
    });

    function openStudentPopup(studentId) {
        fetch(`../PHP/getStudent.php?id=${studentId}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById("student_id").value = data.id;
                document.getElementById("firstname").value = data.firstname;
                document.getElementById("lastname").value = data.lastname;
                document.getElementById("password").value = data.password;
                document.getElementById("popup").style.display = "block";
            });
    }

    function closePopup() {
        document.getElementById("popup").style.display = "none";
    }
</script>
</body>
</html>