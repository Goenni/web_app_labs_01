<?php
include ("../../Shared/DatabaseSingleton.php");
use Shared\DatabaseSingleton;

function login($username, $password)
{
    session_start();
    $db = DatabaseSingleton::getInstance()->getConnection();

    if (empty($username) || empty($password)) {
        echo "Username and password are required.";
        exit();
    }

    $result = $db->query("SELECT * FROM admin WHERE username = '$username'");

    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();

        // Verify password (assuming it's stored as plain text; use password_verify() if hashed)
        if (password_verify($password, $student['password'])) {
            // Login successful
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

login($_POST['username'], $_POST['password']);
