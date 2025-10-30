<?php
include ("../PHP/database_connection.php");
function getStudent()
{
    $db = getDatabaseConnection();
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo "Username and password are required.";
        exit();
    }

    $result = $db->query("SELECT * FROM students WHERE username = '$username'");

    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();

        // Verify password (assuming it's stored as plain text; use password_verify() if hashed)
        if ($password === $student['password']) {
            // Login successful
            $_SESSION['username'] = $student['username'];
            $_SESSION['firstname'] = $student['firstname'];
            $_SESSION['lastname'] = $student['lastname'];

            // Redirect to dashboard or home page
            header("Location: ../dashboard.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Username not found.";
    }
}

getStudent();
?>