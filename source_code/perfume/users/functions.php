<?php
function myFilter($get)
{
    $filterBy = "";
    if (isset($_GET[$get])) {
        $filterBy = $_GET[$get];
    }
    return $filterBy;
}