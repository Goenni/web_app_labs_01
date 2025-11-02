<?php
include_once("../../Shared/DatabaseSingleton.php");
include ("../../Shared/verify_credentials.php");
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

        // Verify password (assuming it's stored as plain text; use password_verify() if hashed)
        if (verify_student_credentials($student_id, $password)) {
            // Login successful
            $result = $db->query("SELECT * FROM students WHERE student_id = '$student_id'");
            $_SESSION['student_id'] = $result['student_id'];
            $_SESSION['firstname'] = $result['firstname'];
            $_SESSION['lastname'] = $result['lastname'];

            // Redirect to dashboard or home page
            header("Location: ../HTML/home.php");
            exit();
        } else {
            echo "Invalid password or Student not found.";
    }
}

getStudent();
?>