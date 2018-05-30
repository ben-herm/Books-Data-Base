<?php

session_start();
require_once '../Model/User.php';
require_once '../DB/DBcalls.php';

$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];
$passCheck = $_POST['confirm-password'];

$GLOBALS['passcheck'] = $passCheck;


$userToSaveInDB = new User($username, $password, $email);

if ((!filter_var($email, FILTER_VALIDATE_EMAIL))) {

    header('Location:../Views/register.php?err=WrongEmailDetails');
    
} else if (checkIfUserExist($userToSaveInDB) == false) {

    header('Location:../Views/register.php?err=WrongRegisterDetails');
} else {

    header('Location:../Views/register.php');
}
//completed
?>






