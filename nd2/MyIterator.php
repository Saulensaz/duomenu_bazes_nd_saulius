<?php

class MyIterator implements Iterator {
    private $myArray;

    public function __construct( $givenArray ) {
        $this->myArray = $givenArray;
    }

    function rewind() {
        return reset($this->myArray);
    }

    function current() {
        return current($this->myArray);
    }

    function key() {
        return key($this->myArray);
    }

    function next() {
        return next($this->myArray);
    }

    function valid() {
        return key($this->myArray) !== null;
    }
}