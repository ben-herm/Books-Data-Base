<?php

require_once '../DB/connect.php';
require_once '../Model/Book.php';

function showAllBooks() {

    $conn = $GLOBALS["connection"];

    $sql = "SELECT * FROM `books`;";

    $result = $conn->query($sql);

    if (!$result) {
        echo "Error select from books: " . $conn->error;
    } else {

        $resultsPerPage = 10;
        $numOfResults = $result->num_rows;
        $numberOfPages = ceil($numOfResults / $resultsPerPage);

        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }

        $limitStatrtNum = ($page - 1) * $resultsPerPage;

        $sql = 'SELECT * FROM books LIMIT ' . $limitStatrtNum . ',' . $resultsPerPage;
        $result = $conn->query($sql);

        for ($page = 1; $page <= $numberOfPages; $page++) {
            echo '<div class="pages"><a class="page" href="index.php?page=' . $page . '">' . "|$page|" . '</a></div> ';
        }

        $myBooks = array();

        while ($row = $result->fetch_assoc()) {
            $book = new Book($row['book_name'], $row['author'], $row['price']);
            $book->id = $row['book_id'];

            array_push($myBooks, $book);
        }

        $conn->close();
        return $myBooks;
    }
}

function showOne($bookId) {
    $conn = $GLOBALS["connection"];
    $sql = "SELECT * FROM `books` WHERE book_id = $bookId;";
    $result = $GLOBALS["connection"]->query($sql);

    if (!$result) {
        echo "Error select from books: " . $conn->error;
    } else {
        $row = $result->fetch_assoc();
        $oneBook = new Book($row['book_name'], $row['author'], $row['price']);
        $oneBook->id = $bookId;
        $conn->close();
        return $oneBook;
    }
}

function search($stringToSearchFor) {
    $conn = $GLOBALS["connection"];
    $sql = "SELECT * FROM books WHERE book_name LIKE '%$stringToSearchFor%';";
    $result = $conn->query($sql);

    if (!$result) {
        echo "Error search from books: " . $conn->error;
    } else {

        $myBooks = array();

        while ($row = $result->fetch_assoc()) {
            $book = new Book($row['book_name'], $row['author'], $row['price']);
            $book->id = $row['book_id'];

            array_push($myBooks, $book);
        }
        $conn->close();
        return $myBooks;
    }
}
