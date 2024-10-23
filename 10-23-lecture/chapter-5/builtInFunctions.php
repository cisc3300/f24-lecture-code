<?php

//builtin string functions
$name = 'Pinecone';

//lower case
echo strtolower($name);

//upper case
echo strtoupper($name);

//string length
echo strlen($name);

//finding the position of characters in a string
echo strpos($name, 'cone');

//replacing a string in a string
echo str_replace('cone', 'test', $name);

//replacing a string in a string with a regular expression
//regular expression: regular expression is a sequence of characters that forms a search pattern. When you search for data in a text, you can use this search pattern to describe what you are searching for. A regular expression can be a single character, or a more complicated pattern
echo preg_replace('/[A-Z]/','V', $name);

//explode returns an array of strings, each of which
// is a substring of string formed by splitting it on
// boundaries formed by the string separator.
$exampleURI = '/users';
var_dump(explode("/", $exampleURI));
//$exampleURI will be ["", "users"]

//builtin number functions
//echo sqrt(9);

//arrays
//$array = ['pinecone', 'nathan'];
//echo in_array('pinecone', $array);

//array mutate
//array_push($array, 'pinecone2');
//var_dump($array);

//sorting
//sort($array);
//var_dump($array);


//constants
//a constant is a name/value pair that acts like a variable
//once it is set it cannot be changed
//little different than in JS, is more used for config type piece of data
//define('SITE_NAME', 'Pinecones\'s Tuna Store');
//echo SITE_NAME;

?>