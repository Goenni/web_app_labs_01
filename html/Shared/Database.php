<?php

namespace Shared;
use mysqli;

class Database
{
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli("db", "your_username", "your_password", "lamp_db");

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }

    public function query($sql)
    {
        return $this->conn->query($sql);
    }

    public function error()
    {
        return $this->conn->error;
    }

    public function close()
    {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}
?>