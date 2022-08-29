<?php
include __DIR__ . "/bddConnexion.php";

class Bdd extends BddConnexion
{
    public function getAllRows($table, $data, $condition)
    {
        $sql = "SELECT $data FROM $table WHERE $condition";
        //Prepare the query:
        $query = $this->connection->prepare($sql);
        return $query;
    }

    function showRow($table, $condition)
    {
        return $this->connection->query("SELECT * FROM $table WHERE $condition");
    }

    public function updateRow($table, $cols, $condition)
    {
        $sql = "UPDATE $table SET $cols WHERE $condition";
        //Prepare the query:
        $query = $this->connection->prepare($sql);
        return $query;
    }

    public function deleteRow($table, $condition)
    {
        $sql = "DELETE FROM $table WHERE $condition";
        //Prepare the query:
        $query = $this->connection->prepare($sql);
        return $query;
    }

    public function insertRow($table, $cols, $data)
    {
        $sql = "INSERT INTO $table($cols) VALUES($data)";
        $query = $this->connection->prepare($sql);
        return $query;
    }
}
