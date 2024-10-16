<?php

//indexed arrays, two ways to declare
    $indexArray = [1, 2, 3];
    $otherSyntax = array(4, 5, 6);

//associative arrays
    $associativeArray = [
      'key1' => 'value1',
      'key2' => 2,
    ];

    echo $indexArray[0];
    echo '<br>';
    var_dump($indexArray);
    echo '<br>';

    $twoDArray = [
        [1, 2, 3],
        [4, 5, 6],
    ];

    var_dump($twoDArray[0]);
    echo '<br>';
    echo $twoDArray[0][2];
    echo '<br>';
    echo $twoDArray[0][2];
