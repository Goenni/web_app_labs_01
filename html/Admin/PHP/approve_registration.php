<?php
include_once("../../Shared/DatabaseSingleton.php");
use Shared\DatabaseSingleton;
function approve_registration($course_id, $student_id){
    $db = DatabaseSingleton::getInstance()->getConnection();
    return ($db->query("UPDATE registrations SET 
              approved = 'Approved'
              WHERE course_id = $course_id
              AND student_id = $student_id"));
}
approve_registration($_GET['course_id'], $_GET['student_id']);