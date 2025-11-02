<?php
include ("database_connection.php");
function getAvailableCourses(){
    $db = DatabaseSingleton::getInstance()->getConnection();
    return($db->query("SELECT * FROM courses"));
}

