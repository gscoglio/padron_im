<?php
session_start();
include("passwords.php");
if (isset($_POST["ac"]) && $_POST["ac"]=="log") { /// do after login form is submitted 
     if ($USERS[$_POST["username"]]==md5($_POST["password"])) { /// check if submitted username and password exist in $USERS array 
          $_SESSION["logged"]=$_POST["username"];
     } else {
          echo 'Incorrect username/password. Please, try again.';
     };
};
if (isset($_SESSION["logged"]) && 
        array_key_exists($_SESSION["logged"],$USERS)) { //// check if user is logged or not 
    header("Location: index.php");
} else { //// if not logged show login form
    include_once 'views/login.mv.php';
};
?>