<?php

trait Database {
    
    protected $connect;
    protected $dsn = DSN;
    protected $user = USER;
    protected $password = PASSWORD;
    function __construct()
    {
        try {
            $this->connect = new PDO($this->dsn, $this->user, $this->password);
        } catch (PDOException $e) {
            die("Connecting to database failed") .$e->getMessage();
        }    
    }
}
?>