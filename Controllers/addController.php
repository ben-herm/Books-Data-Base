<?php
require_once '../Model/Book.php';

$BookName = $_POST['book_name'];
$Author = $_POST['author'];
$Price = $_POST['price'];

 $myNewBook=new Book($BookName, $Author, $Price);
 
  header("Location:../DB/add.php?newBook=".serialize($myNewBook));
  
  exit();