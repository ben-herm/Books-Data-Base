<?php

require_once '../Model/Book.php';

$idForProcess = substr(array_search(current($_POST), $_POST), 7);

if (current($_POST) === "Delete") {
    header("Location:../DB/delete.php?id=$idForProcess");
    exit();
} else {

    if (isset($_POST["commitUpdate"])) {


        $updatedBook = new Book($_POST['updateName'], $_POST['updateAuthor'], $_POST['updatePrice']);

        $updatedBook->id = (int) $_POST["commitUpdate"];


        header("Location:../DB/update.php?updatedBook=" . serialize($updatedBook));
        exit();
    }
}
?>

