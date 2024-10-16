<?php
declare(strict_types = 1);
//declare and call
//function firstFunction() {
//    print('yo');
//}
//
//firstFunction();

//function scope

//$scope = 'yo';
//function secondFunction() {
//    print($scope);
//}
//secondFunction();


//global and static


//$globalScope = 'yo';
//function globalScopeFunction() {
//    global $globalScope;
//    print($globalScope);
//}
//globalScopeFunction();


//function staticVariable($number) {
//    //only initialized on the first call!
//    static $saveForLater = 0;
//    $total = $saveForLater += $number;
//    print($total);
//    print('break');
//    return $total;
//}
////
//staticVariable(1);
//staticVariable(1);


//return multiple values
//function returnArray() {
//    return [
//        'name' => 'Pinecone',
//        'type' => 'floofy'
//    ];
//}
//$returned = returnArray();
//print($returned['name']);

//argument and return type declarations
function calculateTotal(int $price, int $quantity) : int {
    return $price * $quantity;
}

//couple ways of return typing
//function calculateWhatever(int $price, int $quantity) : mixed {
//    return $price * $quantity;
//}

//function calculateWhatever(int $price, int $quantity) : float|int {
//    return $price * $quantity;
//}

//strict typing - turn on above
//$total = calculateWhatever('2', '1');
//print($total);

//multiple return statements
function calculateWhatever4() {
    if (1 === 1) {
        //early return
        return "yes";
    }

    return "no";
}

//optional params / default values
//giving a parameter a default value means it is now optional when calling the function
function calculateWhatever2($price, $quantity, $total = 0) {
    return $price * $quantity * $total;
}
$output = calculateWhatever2(1, 2);

//named arguments

function calculateWhatever3($price, $quantity, $total) {
    return $price * $quantity * $total;
}

$output2 = calculateWhatever3(total: 1, quantity: 2, price: 3);