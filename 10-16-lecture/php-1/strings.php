<?php

//string operators
$test = 'test';
$concat = $test . ' test2';

echo $concat;
echo '<br>';

echo $test .= ' test 3';
echo '<br>';

//template literal

echo "Hello {$test}";