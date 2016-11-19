<?php

namespace ActiveRecord;

Class Book extends ActiveRecord  {

    private $bookId;
    private $title;
    private $genre;
    private $year;
    private $bookAuthors;
    private $table = 'Books';
    private $column = 'bookId';

    /**
     * Book constructor.
     */
    public function __construct()
    {
        parent::__construct($this->table, $this->column);
    }

    /**
     * @return mixed
     */
    public function getBookId()
    {
        return $this->bookId;
    }

    /**
     * @param mixed $bookId
     * @return Books
     */
    public function setBookId($bookId)
    {
        $this->bookId = $bookId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return Books
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param mixed $genre
     * @return Books
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     * @return Books
     */
    public function setYear($year)
    {
        $this->year = $year;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBookAuthors()
    {
        return $this->bookAuthors;
    }

    /**
     * @param mixed $bookAuthors
     * @return Book
     */
    public function setBookAuthors($bookAuthors)
    {
        $this->bookAuthors = $bookAuthors;
        return $this;
    }

}