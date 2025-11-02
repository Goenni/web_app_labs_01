<?php
include("../PHP/get_courses.php");
include("../../Shared/verify_credentials.php");
if (!isset($_SESSION["student_id"]) || !verify_student_credentials($_SESSION['student_id'], $_SESSION['password'])) {
    header("Location: ../HTML/login.php");
    exit();
}
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
<div id="profile">
    <img id="user_icon" src="../../Shared/user-profile.webp" alt="Profile Picture" title="Edit Profile">
    <span id="greeting">Hello, <?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?></span>
</div>

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

<!-- Popup for Editing Profile -->
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
    </div>
</div>

<script>
    // Handle profile picture click to open the edit profile popup
    document.getElementById("user_icon").addEventListener("click", function() {
        openStudentPopup(<?php echo $_SESSION['student_id']; ?>);
    });

    // Open the student popup and populate the form with student data
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

    // Close the popup when the close button is clicked
    function closePopup() {
        document.getElementById("popup").style.display = "none";
    }
</script>
</body>
</html>
