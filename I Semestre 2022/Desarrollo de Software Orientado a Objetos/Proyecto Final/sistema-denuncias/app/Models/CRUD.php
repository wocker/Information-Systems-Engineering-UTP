<?php

include_once('Database.php');


class CRUD extends Database
{
    public function __construct()
    {
        parent::connect();
    }

    public function getData($query)
    {
        $result = $this->conn->query($query);

        if ($result == false) {
            return false;
        }

        $rows = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $rows[] = $row;
        }

        return $rows;
    }

    public function fetch($query)
    {
        $result = $this->conn->query($query);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function prepare($query)
    {
        $result = $this->conn->prepare($query);

        if ($result == false) {
            echo 'Error: cannot execute the command';
            return false;
        } else {
            return $result;
        }
}

    public function execute($query)
    {
        $result = $this->conn->query($query);

        if ($result == false) {
            echo 'Error: cannot execute the command';
            return false;
        } else {
            return true;
        }
    }

    public function delete($id, $table)
    {
        $query = "DELETE FROM $table WHERE id = $id";

        $result = $this->conn->query($query);

        if ($result == false) {
            echo 'Error: cannot delete id ' . $id . ' from table ' . $table;
            return false;
        } else {
            return true;
        }
    }

    public function escape_string($value)
    {
        return $this->conn->real_escape_string($value);
    }

}