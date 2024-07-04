<?php

// class/Database.php

class Database {
    private $host       = "localhost";
    private $username   = "root";
    private $password   = "";
    private $db_name    = "qnov";
    private $conn;

    // Perbaiki nama konstruktor dengan dua garis bawah
    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);

        if($this->conn->connect_error) {
            die('Connection failed: ' . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}

?>
