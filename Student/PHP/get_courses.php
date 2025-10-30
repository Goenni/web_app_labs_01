<?php
include "database_connection.php";
function getCourses(){
    $db = getDatabaseConnection();
    $studentID = $_SESSION['studentID'];
    return ($db->query("SELECT coursename FROM registrations WHERE studentID = $studentID"));
}
?>