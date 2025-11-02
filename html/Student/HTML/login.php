<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link rel="stylesheet" href="../../styles.css">
</head>
<body>

<!-- Login Form -->
<form method="post" action="../PHP/get_student.php">
    <input type="text" name="student_id" placeholder="Student ID">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" value="Login">
</form>
<!-- Popup for Register Form -->
        <form method="POST" action="../PHP/register.php">
            <input type="text" name="student_id" placeholder="Student ID">
            <input type="text" name="firstname" placeholder="First Name" required>
            <input type="text" name="lastname" placeholder="Last Name" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Register">
        </form>


<script>
    // Function to open the Register Popup
    function openRegisterPopup() {
        document.getElementById("registerPopup").classList.remove("hidden");
    }

    // Function to close the Register Popup
    function closeRegisterPopup() {
        document.getElementById("registerPopup").classList.add("hidden");
    }
</script>

</body>
</html>
