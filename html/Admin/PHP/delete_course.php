<?php
include("../../Shared/database_connection.php");
function drop_course($course_id){
    $db = DatabaseSingleton::getInstance()->getConnection();
    $db->query("DELETE FROM courses WHERE course_id=$course_id");
    header("Location: ../HTML/home.php");
}

drop_course($_POST["course_id"]);
