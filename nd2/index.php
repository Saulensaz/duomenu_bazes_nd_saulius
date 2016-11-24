<?php

use Connection\Database;

use ActiveRecord\Book;
//use ActiveRecord\Author;

use DDD\Repositories\BookRepository;
//use DDD\Repositories\AuthorRepository;

require_once('info.php');

/**
 * @param string $pattern
 * @use ActiveRecord or Repository
 */
$pattern = 'Repository';

switch ($pattern) {
    case $pattern == 'ActiveRecord':

        $book = new Book();
//        $author = new Author();

        $book->printAllBooks();

        break;

    case $pattern == 'Repository':

        $db = new Database(DATABASE, USER, PASSWORD);

        $bookRepository = new BookRepository($db->getConn());
//        $AuthorRepository = new AuthorRepository($db->getConn());

        $books = $bookRepository->getAllBooks();

        printBooks($books);

        break;

    default:
        break;
}

function printBooks($books) {
    $it = new MyIterator($books);

    foreach($it as $row) {
        echo 'Knygos pavadinimas: ' . $row['title'] . '<br />Knygos Autoriai: ' . $row['bookAuthors'] . '<br /><br />';
    }
}

function __autoload($class) {
    $class_name = str_replace("\\", "/", $class);
    if(file_exists($class_name . '.php')) {
        require_once($class_name . '.php');
    } else {
        throw new Exception("Unable to load $class_name.");
    }
}