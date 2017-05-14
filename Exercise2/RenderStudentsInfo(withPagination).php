<?php

$html = '';
if (isset($_GET['delimiter'])) {
    $delimiter = $_GET['delimiter'];
    $names = $_GET['names'];
    $ages = $_GET['ages'];
    $currentPage = $_GET['page'];
    if (!empty($names) && !empty($ages)) {
        $html .= '<table border="1" cellpadding="0">';
        $html .= '<tr><td>Name</td><td>Age</td></tr>';
        $namesPerPage = 5;
        $arrayNames = explode($delimiter, $names);
        $arrayAges = explode($delimiter, $ages);
        $namesToShow = array_slice($arrayNames, $namesPerPage * $currentPage - $namesPerPage, $namesPerPage);
        foreach ($namesToShow as $key => $value) {
            $show = ($namesPerPage * ($currentPage - 1)) + $key;
            $html .= "<tr><td>$arrayNames[$show]</td><td>$arrayAges[$show]</td></tr>";
        }
        $html .= '</table>';
        //Pagination
        $numberOfNames = count($arrayNames);
        $maxPages = ceil($numberOfNames / $namesPerPage);
        $theLink = "RenderStudentsInfo(withPagination).php?delimiter=$delimiter&names=$names&ages=$ages&filter=Filter&page=";
        //$theLink = 'RenderStudentsInfo(withPagination).php?delimiter='. urlencode($delimiter) . '&names='. urlencode($names) . '&ages='. urlencode($ages) . '&filter=Filter&page=';
        if ($currentPage > 1) {
            $html .= '<a style="color:green;" href="' . $theLink . ($currentPage - 1) . '">Previous</a>';
        }
        for ($i = 1; $i <= $maxPages; ++$i) {
            if($i == $currentPage){
                $html .= '<span style="color:red;"> ['. $i .'] </span>';
            } else {
                $html .= '<a style="color:green;" href="' . $theLink . $i . '"> ['. $i .'] </a>';
            }
        }
        if ($currentPage < $maxPages) {
            $html .= '<a style="color:green;" href="' . $theLink . ($currentPage + 1) . '">Next</a>';
        }
    } else {
        $html .= "Ivalid Input!";
    }
}
include 'RenderStudentsInfo(HTML).php';
