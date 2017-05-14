<?php
$html = '';
if (isset($_GET['delimiter'])) {
    $delimiter = $_GET['delimiter'];
    $names = $_GET['names'];
    $ages = $_GET['ages'];
    if (!empty($names) && !empty($ages)) {
        $html .= '<table border="1" cellpadding="0">';
        $html .= '<tr><td>Name</td><td>Age</td></tr>';
        $arrayNames = explode($delimiter, $names);
        $arrayAges = explode($delimiter, $ages);
        $endNames = count($arrayNames);
        for ($i = 0; $i < $endNames; ++$i) {
            $html .= "<tr><td>$arrayNames[$i]</td><td>$arrayAges[$i]</td></tr>";
        }
        $html .= '</table>';
    } else {
        $html .= "Ivalid Input!";
    }
}
include 'RenderStudentsInfo(HTML).php';
