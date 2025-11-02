<?php
include("../../Shared/database_connection.php");
function create_course($course_name, $lecturer){
    $db = DatabaseSingleton::getInstance()->getConnection();
    $db->query("INSERT INTO courses (course_name, lecturer) VALUES ('$course_name', '$lecturer')");
    header("Location: ../HTML/home.php");
}

create_course($_POST["course_name"], $_POST["lecturer"]);