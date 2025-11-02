<?php
include ("../../Shared/DatabaseSingleton.php");
use Shared\DatabaseSingleton;

function updateStudent()
{
    $db = DatabaseSingleton::getInstance()->getConnection();

    // Get the student ID from the hidden input
    $student_id = $_POST['student_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'];

    // Validate inputs
    if (empty($student_id) || empty($firstname) || empty($lastname) || empty($password)) {
        echo "All fields are required.";
        exit();
    }

    // Update the student in the database
    $query = "UPDATE students SET 
              firstname = '$firstname', 
              lastname = '$lastname', 
              password = '$password' 
              WHERE id = $student_id";

    if ($db->query($query) === TRUE) {
        echo "Student updated successfully!";
        // Optionally redirect to another page
        header("Location: ../home.php");
        exit();
    } else {
        echo "Error: " . $db->error;
    }
}

// Call the function
updateStudent();
?>