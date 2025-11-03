<?php
include_once ("DatabaseSingleton.php");
use Shared\DatabaseSingleton;
function verify_student_credentials($username, $password) {
    // Get the database connection from the singleton instance
    $db = DatabaseSingleton::getInstance()->getConnection();

    // Use a prepared statement to prevent SQL injection
    $stmt = $db->query("SELECT password FROM students WHERE student_id = '$username'");
    $row = $stmt->fetch_assoc();
    $storedPassword = $row["password"];

    // Use password_verify to check if the entered password matches the hashed one in the database
    if ($password == $storedPassword) {
        return true;
    } else {
        return false;
    }
}


function verify_admin_credentials($username, $password)
{
    // Get the database connection from the singleton instance
    $db = DatabaseSingleton::getInstance()->getConnection();

    // Use a prepared statement to prevent SQL injection
    $stmt = $db->query("SELECT password FROM admin WHERE username = '$username'");
    $row = $stmt->fetch_assoc();
    $storedPassword = $row["password"];


    // Use password_verify to check if the entered password matches the hashed one in the database
    if ($password == $storedPassword) {
        return true;
    } else {
        return false;
    }
}
