<?php
session_start();
include("passwords.php");
if (isset($_POST["ac"]) && $_POST["ac"]=="log") { /// do after login form is submitted  
    if ($USERS[$_POST["username"]]==md5($_POST["password"])) { /// check if submitted username and password exist in $USERS array 
          $_SESSION["logged"]=$_POST["username"];
     } elseif ($USERS['vote'][$_POST["username"]]==md5($_POST["password"])) {
          $_SESSION['tovote']["logged"]=$_POST["username"];
     } else {
          echo 'Incorrect username/password. Please, try again.';
     };
};
if (isset($_SESSION["logged"]) && 
        array_key_exists($_SESSION["logged"],$USERS)) { //// check if user is logged or not 
    header("Location: index.php");
    exit;
} elseif (isset($_SESSION['tovote']["logged"]) &&
    array_key_exists($_SESSION['tovote']["logged"],$USERS['vote'])) { //// check if user is logged or not 
    header("Location: votacion.php");
    exit;
} else { //// if not logged show login form
    include_once 'views/login.mv.php';
};
?>