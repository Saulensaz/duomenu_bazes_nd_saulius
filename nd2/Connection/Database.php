<?php

namespace Connection;

use \PDO;

Class Database {

    private $conn;

    public function __construct($db, $user, $pass)
    {
        try {
            $this->conn = new PDO('mysql:host=localhost;dbname=' . $db, $user, $pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    /**
     * @return PDO
     */
    public function getConn()
    {
        return $this->conn;
    }

    public function __destruct()
    {
        $this->conn = null;
    }
}