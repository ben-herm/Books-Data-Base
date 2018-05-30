<?php

require_once '../DB/connect.php';
require_once '../Model/Book.php';

$book_name = unserialize($_GET['updatedBook'])->bookName;
$author = unserialize($_GET['updatedBook'])->author;
$price = unserialize($_GET['updatedBook'])->price;
$id = unserialize($_GET['updatedBook'])->id;
 
 
$sql = "UPDATE books SET book_name = ?, author = ?,price = ? "
        . " WHERE book_id =$id;";


    $result =  $GLOBALS['conn']->prepare($sql); 
    $result->bind_param("ssi",$book_name,$author,$price);
    

    $result->execute();
    
if (!$result) {
    echo "Update book failed: " . $GLOBALS['conn']->error;
    $GLOBALS['conn']->close();
} else {
    $GLOBALS['conn']->close();
    header("location: ../Views/index.php");
}

?>
