<?php
include_once("../../Shared/DatabaseSingleton.php");
use Shared\DatabaseSingleton;
function registerForCourse($courseID, $studentID){
    $db = DatabaseSingleton::getInstance()->getConnection();
    $db->query("INSERT INTO registrations (student_id,course_id,approved) VALUES ('$studentID','$courseID','Pending')");
    header("Location:../HTML/home.php");
    exit();
}

registerForCourse($_POST['course_id'], $_POST['student_id']);