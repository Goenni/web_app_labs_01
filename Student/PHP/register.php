<?php
session_start();
include("../PHP/database_connection.php");

function registerStudent()
{
    $db = getDatabaseConnection();
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'];
    if (empty($firstname) || empty($lastname) || empty($password)) {
        echo "All fields are required.";
        exit();
    }

    // Check if student already exists (optional)
    $checkResult = $db->query("SELECT * FROM students WHERE firstname = '$firstname' AND lastname = '$lastname'");

    if ($checkResult->num_rows > 0) {
        echo "Student already registered.";
        exit();
    }

    // Insert new student into database
    $query = "INSERT INTO students (firstname, lastname, password) VALUES ('$firstname', '$lastname', '$password')";

    if ($db->query($query) === TRUE) {
        echo "Registration successful!";
        // Optionally redirect to login page
        header("Location: ../login.php");
        exit();
    } else {
        echo "Error: " . $db->error;
    }
}

// Call the function
registerStudent();
?>