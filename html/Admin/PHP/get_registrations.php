<?php
include_once("../../Shared/DatabaseSingleton.php");
use Shared\DatabaseSingleton;
function getRegistrations(){
    $db = DatabaseSingleton::getInstance()->getConnection();
    return $db->query("SELECT courses.course_name, registrations.student_id FROM registrations JOIN courses ON registrations.course_id = courses.course_id");
}
getRegistrations();