<?php

use Shared\Database;

include "Database.php";
function getDatabaseConnection()
{
    if (isset($_SESSION['db'])) {
        return $_SESSION['db'];
    }
    $_SESSION['db'] = new Database();
    return $_SESSION['db'];
}
