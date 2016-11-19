<?php

namespace DDD\Entities;

Class Authors  {

    private $authorId;
    private $name;

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