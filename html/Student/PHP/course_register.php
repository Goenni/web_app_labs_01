<?php
include("../../Shared/database_connection.php");
function registerForCourse($courseID){
    $db = DatabaseSingleton::getInstance()->getConnection();
    $student_id = $_SESSION['studentID'];
    return($db->query("INSERT INTO registrations (studentID,courseID,approved) VALUES ('$student_id','$courseID','pending')"));
}

registerForCourse($_GET['courseID']);