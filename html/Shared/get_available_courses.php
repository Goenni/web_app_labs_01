<?php
include ("DatabaseSingleton.php");
use Shared\DatabaseSingleton;

function getAvailableCourses(){
    $db = DatabaseSingleton::getInstance()->getConnection();
    return($db->query("SELECT * FROM courses"));
}


