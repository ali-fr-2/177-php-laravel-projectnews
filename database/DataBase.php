<?php

namespace database;

use PDO;
use PDOException;

class Database
{

    private $host = HOST;
    private $dbname = DB_NAME;
    private $username = USERNAME;
    private $password = PASSWORD;
    private $conn;

    public function __construct()
    {
        try {

            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname};",
                $this->username,
                $this->password

            );

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo "connection success";

            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {

            die($e->getMessage());
        }
        return $this->conn;
    }
    // function getConnection(){
    //     return $this->conn;
    // }
}
