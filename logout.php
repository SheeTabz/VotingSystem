<?php
// start session
    session_start();
    // require ('retrieve.php');

    // unset individual session variables
    unset($_SESSION['firstname']);
    unset($_SESSION['lastname']);
    // unset($_SESSION['id']);
    // unset($_SESSION['phone_number']);
    // unset($_SESSION['email']);
    // unset($_SESSION['password']);
    session_unset();

    //redirect the user to the login page
    header('Location: login.php');
    

?>