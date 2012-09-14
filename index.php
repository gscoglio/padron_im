<?php

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