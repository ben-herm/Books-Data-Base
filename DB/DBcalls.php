<?php

require 'connect.php';

function checkIfUserExist($user) {
    $conn = $GLOBALS["connection"];
    $username = $user->getUsername();
    $password = $user->getPassword();
    $email = $user->getEmail();
    $passcheck = $GLOBALS['passcheck'];
    $sql = "SELECT username FROM users where username='" . $username . "'";
    $result = $conn->query($sql);
    if (($result->num_rows > 0) || ($password != $passcheck) || (!filter_var($email, FILTER_VALIDATE_EMAIL))) {
        return false;
    }  else {
        createUser($user);
        return true;
    }
}

function loginIfUserExist($userLogin, $userPassword) {
    $conn = $GLOBALS["connection"];
    $sql = "SELECT username FROM users where username='" . $userLogin . "'";
    $sql2 = "SELECT password FROM users where password='" . $userPassword . "'";
    $result = $conn->query($sql);
    $result2 = $conn->query($sql2);
    if ($result->num_rows > 0 && ($result2->num_rows > 0)) {
        return true;
    } else {
        return false;
    }
}

//gets an object of class USER contains(username, password , email)
function createUser($user) {
    $conn = $GLOBALS["connection"];
    $username = $user->getUsername();
    $password = $user->getPassword();
    $email = $user->getEmail();
    $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password, $email);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

/*
//gets an object of class USER contains(username, password , email)
function getAllUsers() {
    $conn = $GLOBALS["connection"];
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    $users = array();

    while ($row = $result->fetch_assoc()) {
        $username = $row["username"];
        $id = $row["id"];
        $email = $row["email"];
        $password = $row["password"];

        //  $currentUserFromDB = new User($username, $password, $email);
        //  $currentUserFromDB->id = $id;

        $currentUserFromDB = new User($username, $password, $email, $id);

        array_push($users, $currentUserFromDB);

        // var_dump($users);
    }
 

    $conn->close();

    return $users;
}
 
 make sure passwords are the same;
 make redirect headers from pages to pages.
 check if username and password are correc in login.
 add/update and delete forms.
 check if username is in session in forms.
 
 
 * 
 
 */
