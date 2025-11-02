<?php
function logout(){
    session_start();
    header("Location: ../");
    session_destroy();
    exit();
}

logout();