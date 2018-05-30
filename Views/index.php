<?php
session_start();

require_once '../DB/connect.php';
require_once '../Model/Book.php';
require_once '../DB/showAll.php';

if (!isset($_SESSION['userlog'])) {

    header('Location:register.php');
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Books DB</title>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../styles/style.css">
        <link href="https://fonts.googleapis.com/css?family=Pangolin" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <a class="link" href="addbook.php">Add Book Page</a>
        <a class="link" href="register.php">Login/Register</a>
        <?php
        if (isset($_GET['search'])) {
            echo "<a class='link' href='index.php' >Show All</a>";
        }
        ?>

        <h1>Books in DB</h1>

        <form class="search" action="index.php" method="GET">
            <input class="searchBox" type='search' name="search_input" placeholder="Search By Book Name.."> 
            <span> <input type='submit' name="search" value='Search!'></span><br/><br/> 
        </form>
        <br/>

        <table>
            <?php
            if (!isset($_GET['search'])) {
                $allBooks = showAllBooks();
                if ($allBooks) {
                    echo " <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Author</th>
                <th>Price</th> 
                <th>Edit/Delete</th>
            </tr>";

                    foreach ($allBooks as $value) {

                        $id = $value->id;
                        $name = $value->bookName;
                        $author = $value->author;
                        $price = $value->price;
                        echo "<tr> "
                        . "<td>$id</td>"
                        . "<td>$name</td>"
                        . "<td>$author</td>"
                        . "<td>$price</td>"
                        . "<td> <form action='../Controllers/deleteEditController.php' method='POST'>"
                        . "<input class='edit-delete' type='submit' name='delete.$id' value='Delete'>"
                        . "</form>"
                        . "<form action='updateView.php' method='POST'> "
                        . "<input class='edit-delete' type='submit' name='update.$id' value='Edit'> "
                        . "</form>"
                        . "</td>"
                        . "</tr>";
                    }
                } else {
                    echo '<h2> There are no records of books in DB yet.<br/>'
                    . 'Please add a book and try again.</h2>';
                }
            } else {
                echo "<a class='showAll' href='../Views/index.php'>ShowAll</a>";
                $searchInput = $_GET['search_input'];
                $wantedBooks = search($searchInput);

                if ($wantedBooks) {
                    echo " <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Author</th>
                <th>Price</th> 
                
                  </tr>";


                    foreach ($wantedBooks as $value) {

                        $id = $value->id;
                        $name = $value->bookName;
                        $author = $value->author;
                        $price = $value->price;
                        echo "<tr> "
                        . "<td>$id</td>"
                        . "<td>$name</td>"
                        . "<td>$author</td>"
                        . "<td>$price</td>"
                        . "</tr>";
                    }
                } else {
                    echo "<h2> There are no records by the name $searchInput .</h2>";
                }
            }

//check if user is logged in
            /*
              if (!isset($_SESSION['userlog'])) {

              header('Location:register.php');
              }
             */
            ?>
        </table>


    </body>


</html>


