<?php
include ("../../Shared/DatabaseSingleton.php");
use Shared\DatabaseSingleton;
function getStudent()
{
    session_start();
    $db = DatabaseSingleton::getInstance()->getConnection();
    $student_id = $_POST['student_id'];
    $password = $_POST['password'];

    if (empty($student_id) || empty($password)) {
        echo "Username and password are required.";
        exit();
    }

    $result = $db->query("SELECT * FROM students WHERE student_id = '$student_id'");

    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();

        // Verify password (assuming it's stored as plain text; use password_verify() if hashed)
        if (password_verify($password, $student['password'])) {
            // Login successful
            $_SESSION['student_id'] = $student['student_id'];
            $_SESSION['firstname'] = $student['firstname'];
            $_SESSION['lastname'] = $student['lastname'];

            // Redirect to dashboard or home page
            header("Location: ../HTML/home.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Student not found.";
    }
}

getStudent();
?>