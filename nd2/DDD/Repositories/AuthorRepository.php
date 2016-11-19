<?php

namespace DDD\Repositories;

use DDD\Entities\Authors;
use \PDO;

Class AuthorRepository {

    private $db;
    private $table = 'Authors';

    /**
     * AuthorRepository constructor.
     * @var Database
     */
    public function __construct(PDO $db = null)
    {
        $this->db = $db;
    }

    public function find($id) {
        $row = $this->db->prepare('SELECT * from ' . $this->table . ' WHERE AuthorId = ?');

        $row->bindValue(1, $id, PDO::PARAM_INT);
        $row->execute();
        $row->setFetchMode(PDO::FETCH_CLASS, Authors::Class);

        $result = $row->fetch();

        return $result;
    }

    public function findAll() {
        $result = array();

        $query = $this->db->query('SELECT * from ' . $this->table);
        $query->setFetchMode(PDO::FETCH_CLASS, Authors::Class);

        foreach($query->fetchAll() as $row) {
            $result[] = $row;
        }

        return $result;
    }

}