<?php
require_once '../DB/connect.php';

$id = $_GET['id'];
$sql = "DELETE FROM books WHERE book_id = $id";

$result =  $GLOBALS["connection"]->query($sql); 
    if ($result !== TRUE) {
        echo "Delete book failed: " .  $GLOBALS["connection"]->error;
    } 
  $GLOBALS["connection"]->close();
    header("location: ../Views/index.php");

