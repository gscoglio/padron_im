<?php

session_start(); /// initialize session
include_once("passwords.php");
check_logged(); /// function checks if visitor is logged. If user is not logged the user is redirected to login.php page 

include_once 'controllers/reporte.mc.php';
include_once 'views/reporte.mv.php';