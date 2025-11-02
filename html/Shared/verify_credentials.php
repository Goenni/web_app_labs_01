<?php
include_once ("DatabaseSingleton.php");
use Shared\DatabaseSingleton;
function verify_student_credentials($username, $password) {
    // Get the database connection from the singleton instance
    $db = DatabaseSingleton::getInstance()->getConnection();

    // Use a prepared statement to prevent SQL injection
    $stmt = $db->prepare("SELECT password FROM students WHERE student_id = :username LIMIT 1");

    // Bind the username parameter
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);

    // Execute the query
    $stmt->execute();

    // Fetch the result
    $storedPassword = $stmt->fetchColumn();

    // If the user doesn't exist, return false
    if (!$storedPassword) {
        return false;
    }

    // Use password_verify to check if the entered password matches the hashed one in the database
    if (password_verify($password, $storedPassword)) {
        return true;
    } else {
        return false;
    }
}


function verify_admin_credentials($username, $password) {
    // Get the database connection from the singleton instance
    $db = DatabaseSingleton::getInstance()->getConnection();

    // Use a prepared statement to prevent SQL injection
    $stmt = $db->prepare("SELECT password FROM admins WHERE username = :username LIMIT 1");

    // Bind the username parameter
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);

    // Execute the query
    $stmt->execute();

    // Fetch the result
    $storedPassword = $stmt->fetchColumn();

    // If the user doesn't exist, return false
    if (!$storedPassword) {
        return false;
    }

    // Use password_verify to check if the entered password matches the hashed one in the database
    if (password_verify($password, $storedPassword)) {
        return true;
    } else {
        return false;
    }
}