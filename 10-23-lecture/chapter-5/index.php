<?php

//echo $_SERVER["REQUEST_URI"];
//echo $_SERVER["REQUEST_METHOD"];

//$uriArray = explode("/", $_SERVER["REQUEST_URI"]);

//var_dump($uriArray);

header("Content-Type: application/json");

echo json_encode([
    'name' => 'pinecone'
]);