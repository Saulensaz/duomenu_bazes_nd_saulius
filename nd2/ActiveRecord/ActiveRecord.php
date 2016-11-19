<?php

namespace ActiveRecord;

use Connection\Database;
use \PDO;

class ActiveRecord
{

    private $db;
    private $table;
    private $column_name;

    /**
     * ActiveRecord constructor.
     * @param string $table
     * @param string $column_name
     */
    public function __construct($table = '', $column_name = '')
    {
        $db = new Database(DATABASE, USER, PASSWORD);
        $this->db = $db->getConn();

        $this->table = $table;
        $this->column_name = $column_name;
    }

    public function find($id) {
        $row = $this->db->prepare('SELECT * from ' . $this->table . ' WHERE ' . $this->column_name . ' = ' . $id);
        $row->execute();
        $result = $row->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function findAll() {
        $result = array();
        $query = $this->db->query('SELECT * from ' . $this->table);
        foreach($query->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $result[] = $row;
        }
        return $result;
    }

    public function printAllBooks() {
        $query = $this->db->query('SELECT b.title, GROUP_CONCAT(DISTINCT a.name) AS bookAuthors FROM Books b LEFT JOIN BooksToAuthors bta ON b.bookId = bta.bookId LEFT JOIN Authors a ON a.authorId = bta.authorId GROUP BY b.bookId');
        $query->setFetchMode(PDO::FETCH_ASSOC);

        printBooks($query->fetchAll());
    }

}