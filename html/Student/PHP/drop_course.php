<?php
include_once("../../Shared/DatabaseSingleton.php");
use Shared\DatabaseSingleton;
function dropCourse($course_id, $student_id){
    $db = DatabaseSingleton::getInstance()->getConnection();
    $db->query("UPDATE registrations SET approved = 'Dropped' WHERE course_id='$course_id' AND student_id='$student_id'");
    header("Location:../HTML/home.php");
    exit();
}

dropCourse($_POST['course_id'], $_POST['student_id']);