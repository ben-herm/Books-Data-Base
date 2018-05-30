<?php

session_start();
require_once '../DB/DBcalls.php';


if (loginIfUserExist($_POST["username"], $_POST["password"])) {
    $_SESSION['userlog'] = $_POST["username"];
    $_SESSION['passlog'] = $_POST["password"];
    header('Location:../Views/index.php');
    
} else {

    header('Location:../Views/register.php?err=WrongLoginDetails');
}
