<?php

$uriArray = explode("/", $_SERVER["REQUEST_URI"]);

//var_dump($uriArray);

header("Content-Type: application/json");

echo json_encode([
    'name' => 'pinecone'
]);