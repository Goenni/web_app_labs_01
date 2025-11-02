<?php
include ("../../Shared/DatabaseSingleton.php");
use Shared\DatabaseSingleton;
session_start();
function registerStudent()
{
    $db = DatabaseSingleton::getInstance()->getConnection();

    // Get the form inputs
    $student_id = $_POST['student_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'];

    // Validate inputs
    if (empty($student_id) || empty($firstname) || empty($lastname) || empty($password)) {
        echo "All fields are required.";
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the student into the database
    $query = "INSERT INTO students (student_id, firstname, lastname, password) 
              VALUES ($student_id, '$firstname', '$lastname', '$hashed_password')";

    if ($db->query($query) === TRUE) {
        echo "Student registered successfully!";
        // Optionally redirect to another page
        header("Location: ../home.php");
        exit();
    } else {
        echo "Error: " . $db->error;
    }
}

// Call the function
registerStudent();
?>