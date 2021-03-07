<?php


class Database{
    private $mysqli;
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $db_name = 'product_reviews';
    public $result;

    public function __construct(){
        $this->mysqli = new mysqli("$this->host", "$this->user", "$this->password", "$this->db_name");
        $this->mysqli->set_charset("utf8");

        if ($this->mysqli->connect_errno) {
            printf("Connection error ", $this->mysqli->connect_error);
        }
    }

    public function query($query){
        $execute = $this->mysqli->query($query);
        $this->getResult($this->mysqli);
        return $execute;
    }

    public function getResult($mysqli){
        $this->result = $mysqli->affected_rows;
    }
    
}