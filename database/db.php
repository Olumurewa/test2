<?php
namespace Test2\database;
class DbConn 
{
    public $conn;

    function __construct()
    {
        try
        {
            require '../config/config.php';
            $this->conn = new \PDO("mysql:host=$DB_HOST; dbname=$DB_DATABSE", $DB_USER, $DB_PASSWORD);
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        catch(\PDOException $e)
        {
            $error = "Error: " . $e->getMessage();
            echo '<script type="text/javascript">alert("'.$error.'");</script>';
        }
    }
  
}



    
