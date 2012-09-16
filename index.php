<?php

session_start(); /// initialize session
include("passwords.php");
check_logged(); /// function checks if visitor is logged. If user is not logged the user is redirected to login.php page 

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

if (isset($_GET['amount'])) {
    $amount = $_GET['amount'];
} else {
    $amount = 20;
}

include_once 'socios.mv.php';