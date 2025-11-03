<?php
include_once("../../Shared/DatabaseSingleton.php");
use Shared\DatabaseSingleton;
function getStudentsCourses(){
    $db = DatabaseSingleton::getInstance()->getConnection();
    $student_id = $_SESSION['student_id'];
    return ($db->query("SELECT courses.course_id, courses.course_name, courses.lecturer FROM courses JOIN registrations WHERE courses.course_id = registrations.course_id AND registrations.student_id = '$student_id' AND registrations.approved != 'Dropped'"));
}