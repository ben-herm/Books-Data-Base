<?php
require_once '../DB/connect.php';
require_once '../Model/Book.php';


    $book_name = unserialize($_GET['newBook']) ->bookName;
    $author = unserialize($_GET['newBook']) ->author;
    $price = unserialize($_GET['newBook']) ->price;
    
   $sql = "INSERT INTO books (book_name,author,price)
                VALUES (?,?,?)";

    $result =  $GLOBALS['conn']->prepare($sql); 
    $result->bind_param("ssi",$book_name,$author,$price);
    $result->execute();
    if ($result !== TRUE) {
        echo "Add book failed: " .  $GLOBALS['conn']->error;
    } 
    $GLOBALS['conn']->close();
    header("location: ../Views/index.php");
    exit();



