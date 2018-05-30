 <?php

class User {

    private $id;
    private $username;
    private $password;
    private $email;

    function __construct($username, $password, $email) {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }
    
     function __construct1($username, $password, $email, $id) {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->id = $id;
    }
    
      function getUsername() {
        return $this->username;
    }

    function getId() {
        return $this->id;
    }

    function getPassword() {
        return $this->password;
    }

    function getEmail() {
        return $this->email;
    }


}
