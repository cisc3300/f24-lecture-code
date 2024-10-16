<?php
    $indexArray = [1, 2, 3];
    $otherSyntax = array(4, 5, 6);

//    set with the arrow operator
    $associativeArray = [
      'key1' => 'value1'
    ];

//    print($indexArray[0]);

    $twoDArray = [
        [1, 2, 3],
        [4, 5, 6],
    ];

//    print($otherSyntax[0]);
    print($twoDArray[0][2]);
