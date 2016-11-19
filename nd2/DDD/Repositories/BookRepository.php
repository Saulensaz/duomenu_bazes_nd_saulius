<?php

namespace DDD\Repositories;

use Connection\Database;
use DDD\Entities\Books;
use \PDO;

Class BookRepository {

    private $db;
    private $table = 'Books';

    /**
     * BookRepository constructor.
     * @var Database
     */
    public function __construct(PDO $db = null)
    {
        $this->db = $db;
    }

    public function find($id) {
        $row = $this->db->prepare('SELECT * from ' . $this->table . ' WHERE bookId = ?');

        $row->bindValue(1, $id, PDO::PARAM_INT);
        $row->execute();
        $row->setFetchMode(PDO::FETCH_CLASS, Books::Class);

        $result = $row->fetch();

        return $result;
    }

    public function findAll() {
        $result = array();

        $query = $this->db->query('SELECT * from ' . $this->table);
        $query->setFetchMode(PDO::FETCH_CLASS, Books::Class);

        foreach($query->fetchAll() as $row) {
            $result[] = $row;
        }

        return $result;
    }

    public function getAllBooks() {
        $result = [];

        $query = $this->db->query('SELECT b.title, GROUP_CONCAT(DISTINCT a.name) AS bookAuthors FROM Books b LEFT JOIN BooksToAuthors bta ON b.bookId = bta.bookId LEFT JOIN Authors a ON a.authorId = bta.authorId GROUP BY b.bookId');
        $query->setFetchMode(PDO::FETCH_CLASS, Books::Class);

        foreach($query->fetchAll() as $row) {
            $result[] = [
                'title' => $row->getTitle(),
                'bookAuthors' => $row->getBookAuthors()
            ];
        }

        return $result;
    }

}