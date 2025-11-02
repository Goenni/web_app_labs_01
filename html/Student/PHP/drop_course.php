<?php
include("../../Shared/database_connection.php");
function dropCourse($course_id){
    $db = DatabaseSingleton::getInstance()->getConnection();
    $student_id = $_SESSION['student_id'];
    return($db->query("DELETE FROM registrations WHERE course_id='$course_id' AND student_id='$student_id'"));
}

dropCourse($_GET['course_id']);