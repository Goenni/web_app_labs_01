<?php
include_once("../../Shared/DatabaseSingleton.php");
use Shared\DatabaseSingleton;
include ("../../Shared/verify_credentials.php");

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
        $admin = $result->fetch_assoc();

        // Verify password (assuming it's stored as plain text; use password_verify() if hashed)
        if (verify_admin_credentials($admin['username'], $admin['password'])) {
            // Login successful
            // Redirect to dashboard or home page
            $_SESSION['admin'] = $admin;
            $_SESSION['password'] = password_hash($password, PASSWORD_DEFAULT);
            header("Location: ../HTML/home.php");
            exit();
        } else {
            echo "Invalid password or username.";
        }
    }
}
login($_POST['username'], $_POST['password']);
