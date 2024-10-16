<?php

//conditionals

//if

$number = 1;

if ($number === 1) {
    echo 'true';
}
echo '<br>';
//
////if else
//
//if ($number === 1) {
//    echo 'true';
//} else {
//    echo 'false';
//}


//ternary

$ternaryOperator = (1 < 2) ? 'true' : 'false';

//if elseif

//if (1 > 2) {
//    echo "first block";
//} elseif (3 > 4) {
//    echo "second block";
//}

//switch

//$status = 'ACTIVE';
//switch ($status) {
//    case 'DELETED':
//        echo 'is deleted';
//        break;
//    case 'ACTIVE':
//        echo 'is active';
//        break;
//    default:
//        echo 'was neither';
//}


//match

$food = 'cake';

$return_value = match ($food) {
    'apple' => 'This food is an apple',
    'bar' => 'This food is a bar',
    'cake' => 'This food is a cake',
};
echo $return_value;






