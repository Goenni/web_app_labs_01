<?php
include "database_connection.php";
function getCourses(){
    $db = DatabaseSingleton::getInstance()->getConnection();
    $studentID = $_SESSION['studentID'];
    return ($db->query("SELECT coursename FROM registrations WHERE studentID = $studentID"));
}
?>