<?php

session_start(); /// initialize session
include_once("passwords.php");
check_logged(); /// function checks if visitor is logged. If user is not logged the user is redirected to login.php page 

include_once 'config/config.php';

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

if (isset($_GET['amount'])) {
    $amount = $_GET['amount'];
} else {
    $amount = AMOUNT_PER_PAGE;
}

$criterias = array();
$where = $paginatorSearch = '';

foreach ($searchCriterias as $criteria => $type) {
    array_push($criterias, $criteria);
}

if (isset($_GET['criteria']) && in_array($_GET['criteria'], $criterias)) {
    $criteria = $_GET['criteria'];
    if (isset($_GET['search'])) {
        $search = mysql_real_escape_string(urldecode($_GET['search']));
        $paginatorSearch = "&search=" . $_GET['search'] . 
            '&criteria=' . $_GET['criteria']; 
        if ($searchCriterias[$_GET['criteria']] == 'text') {
            $where = $criteria . ' like ' . "'%" . $search . "%'";
        } else {
                $where = $criteria . "=" . "'" . mysql_real_escape_string($search) . "'";
        }
    }
}

include_once 'home.php';