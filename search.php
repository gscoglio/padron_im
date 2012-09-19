<?php

if (!isset($_POST['searchCriteria']) || !isset($_POST['searchText']) ||
        empty($_POST['searchCriteria']) || empty($_POST['searchText'])) {
    header("Location: index.php");
    exit;
}

switch ($_POST['searchCriteria']) {
    case "Apellido":
        $whereCriteria = "apellido";
        break;
    case "Nombre":
        $whereCriteria = "nombre";
        break;
    case "Socio IM":
        $whereCriteria = "socio_nro";
        break;
    case "Socio CAI":
        $whereCriteria = "socio_cai";
        break;
    case "DNI":
        $whereCriteria = "dni";
        break;
    default:
        header("Location: index.php");
        exit;
        break;
}

$searchText = urlencode(mysql_real_escape_string($_POST['searchText']));

header("Location: index.php?search=$searchText&criteria=$whereCriteria");

