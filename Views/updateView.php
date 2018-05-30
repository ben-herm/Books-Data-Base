<?php
session_start();
require_once '../DB/connect.php';
require_once '../Model/Book.php';
require_once '../DB/showAll.php';
require_once '../Controllers/deleteEditController.php';

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
        <title>Update Book</title>
        <link rel="stylesheet" type="text/css" href="../styles/style.css">

       
    </head>
    <body>
        <a class="link"href="../Views/index.php" >Cancel Update</a>
        <h1>Update book :</h1>
        <table>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Author</th>
                <th>Price</th> 
            </tr>

            <?php
            $idForProcess = substr(array_search(current($_POST), $_POST), 7);

            $bookForUpdate = showOne($idForProcess);

            $id = $bookForUpdate->id;
            $name = $bookForUpdate->bookName;
            $author = $bookForUpdate->author;
            $price = $bookForUpdate->price;


            echo "<tr> "
            . "<td>$id</td>"
            . "<td>$name</td>"
            . "<td>$author</td>"
            . "<td>$price</td>"
            . "</tr>";
            ?>
        </table>

        <?php
        echo "<br/>";

        echo" <form class='myForm' action='../Controllers/deleteEditController.php' method='POST'>" .
        "<input type='text' name='updateName' value=$name><br/><br/>" .
        "<input type ='text' name='updateAuthor' value=$author><br/><br/>" .
        "<input type='number' name='updatePrice' value=$price>" .
        "<input type='hidden' name='commitUpdate' value='$id'>" .
        "<br/>" .
        "<br/>" .
        "<input type ='submit' name= 'update' value='Update'>" .
        "</form>";
        ?>

    </body>
</html>
