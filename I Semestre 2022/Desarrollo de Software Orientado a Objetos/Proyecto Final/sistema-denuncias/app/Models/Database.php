<?php

class Database
{
    // Parámetros de la base de datos
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $db_name = 'gestor_denuncias';

    protected $conn;

    // DB Connect
    public function connect()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Error al conectar: ' . $e->getMessage();
        }

        return $this->conn;
    }
}