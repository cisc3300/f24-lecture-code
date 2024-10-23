<?php

//string operators
$test = 'cat';
$concat = $test . ' test2';

echo $concat;
echo '<br>';

echo $test .= ' test 3';
echo '<br>';

//template literal

echo "Hello {$test}s";