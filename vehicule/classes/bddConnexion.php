<?php

class BddConnexion
{
    private $host = "localhost";
    private $dbname = "voiture";
    private $user = "root";
    private $password = "";
    private $dbtype = "mysql";
    public $connection;

    public function __construct()
    {
        $this->connection = new PDO(
            "$this->dbtype:
                    host=$this->host;
                    dbname=$this->dbname",
            $this->user,
            $this->password
        );
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
