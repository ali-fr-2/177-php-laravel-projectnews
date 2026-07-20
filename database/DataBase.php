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
        // return $this->conn;
    }
    function getConnection()
    {
        return $this->conn;
    }
    public function SelectAll($table)
    {
        try {
            $tables = [
                "users",
                "posts",
                "categories"
            ];
            if (!in_array($table, $tables)) {
                die("Invalid Table");
            } else {
                $sql = "SELECT * FROM " . $table;
                $statement = $this->conn->prepare($sql);
                $statement->execute();
            }
            // return $statement->fetchAll();
            return $statement;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function Find($table, $id)
    {
        try {
            $tables = [
                "users",
                "posts",
                "categories"
            ];
            if (!in_array($table, $tables)) {
                die("Invalid Table");
            } else {
                $sql = "SELECT * FROM " . $table . " WHERE id=?";
                $statement = $this->conn->prepare($sql);
                $statement->execute([$id]);
            }
            return $statement;
            // return $statement->fetch();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function InsertInTable($table, $fields, $data)
    {
        try {
            $tables = [
                "users",
                "posts",
                "categories"
            ];
            if (!in_array($table, $tables)) {
                die("Invalid Table");
            } else {
                $statement = $this->conn->prepare("INSERT INTO " . $table . " (" . implode(', ', $fields) . " ,created_at) VALUES ( :" . implode(', :', $fields) . " , now())");
                $statement->execute(array_combine($fields, $data));
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
