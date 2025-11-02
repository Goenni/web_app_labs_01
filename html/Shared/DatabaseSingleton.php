<?php

namespace Shared;

include "Database.php";

class DatabaseSingleton {
    private static $instance = null;
    private $connection;

    private function __construct() {
        $this->connection = new Database();
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new DatabaseSingleton();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}