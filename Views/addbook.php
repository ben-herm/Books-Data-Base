<?php
session_start();
if (!isset($_SESSION['userlog'])) {

   header('Location:register.php');
} 
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add a Book!</title>
         <link rel="stylesheet" type="text/css" href="../styles/style.css">
     
    </head>
    <body>
        <a class="link" href="index.php" >All Books</a>
        <h1>Add A book to the Data Base :</h1>
        <form class='myForm' action='../Controllers/addController.php' method='post'>
            <input type='text' name='book_name' placeholder="Book Name.."><br/><br/>
            <input type ='text' name='author' placeholder="Book Author.."><br/><br/>
            <input type='number' name='price' placeholder="Book Price..">
            <br/>
            <br/>
            <input type ='submit' value='Add!'>

        </form>


    </body>
</html>
