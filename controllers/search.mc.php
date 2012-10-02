<?php

function selected($option) {
    if (!isset($option)) {
        return '';
    }
    
    if (isset($_GET['criteria']) && $_GET['criteria'] == $option) {
        return 'selected';
    }
    
    return '';
}

function searchText() {
    if (isset($_GET['search'])) {
        return $_GET['search'];
    }
    return '';
}