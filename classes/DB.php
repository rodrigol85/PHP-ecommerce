<?php

class DB {
    public $conn;
    public $pdo;
    
    public function __construct() {
        global $conn;
        $this->conn = $conn;

        if(mysqli_connect_errno()){
            echo 'Failed to connect to MySql ' . mysqli_connect_errno();
            die;
        }
        $this->pdo = new PDO('mysql:dbname=' .DB_NAME . ';host=' . DB_HOST, DB_USER, DB_PASS );

    }

    public function query($sql){
        try
         {
            $q = $this->pdo->query($sql);
            if(!$q){
                throw new Exception('Error executing query ...');
                return;
            }
            $data = $q->fetchAll();
            return $data;

        }
        catch(Exception $e){
            throw $e;
        }
    }
    
}






?>