<?php
include ("../../Shared/DatabaseSingleton.php");
use Shared\DatabaseSingleton;
function getStudents(){
    $db = DatabaseSingleton::getInstance()->getConnection();
    return $db->query("SELECT * FROM students");
}
getStudents();