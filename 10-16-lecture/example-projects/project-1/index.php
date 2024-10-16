<?php

header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");



$yo = 'hey';

//echo "$yo";

$yo = [
    'name' => 'yo',
    'array' => [
        'yo' => 'hey'
    ]
];
//var_dump
echo json_encode($yo);
exit();

?>

