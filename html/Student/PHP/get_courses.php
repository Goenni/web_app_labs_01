<?php
include ("../../Shared/DatabaseSingleton.php");
use Shared\DatabaseSingleton;
function getStudentsCourses(){
    $db = DatabaseSingleton::getInstance()->getConnection();
    $student_id = $_SESSION['student_id'];
    return ($db->query("SELECT coursename FROM registrations WHERE student_id = $student_id"));
}