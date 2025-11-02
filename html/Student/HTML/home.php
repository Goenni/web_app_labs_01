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
<div id="courses">
    <h3>Your Courses:</h3>
    <ul>
        <?php
        while ($row = $courses->fetch_assoc()) {
            echo "<li>" . htmlspecialchars($row['coursename']) . "</li>";
        }
        ?>
    </ul>
</div>

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
        openStudentPopup(<?php echo $studentID; ?>);
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