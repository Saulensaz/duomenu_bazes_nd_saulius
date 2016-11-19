<?php

namespace ActiveRecord;

Class Author extends ActiveRecord {

    private $authorId;
    private $name;
    private $table = 'Authors';
    private $column = 'authorId';

    /**
     * Author constructor.
     */
    public function __construct()
    {
        parent::__construct($this->table, $this->column);
    }

    /**
     * @return mixed
     */
    public function getAuthorId()
    {
        return $this->authorId;
    }

    /**
     * @param mixed $authorId
     * @return Authors
     */
    public function setAuthorId($authorId)
    {
        $this->authorId = $authorId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Authors
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

}