<?php
include_once("../../Shared/DatabaseSingleton.php");
use Shared\DatabaseSingleton;
function dropCourse($course_id){
    $db = DatabaseSingleton::getInstance()->getConnection();
    $student_id = $_SESSION['student_id'];
    return($db->query("UPDATE registrations SET approved = 'Dropped' WHERE course_id='$course_id' AND student_id='$student_id'"));
}

dropCourse($_GET['course_id']);