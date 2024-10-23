<?php

//most are the same as JS
//&& and, || or, ! not, () for grouping

//some php specific ones

// comparison

//the spaceship operator
//Return 0 if values on either side are equal
//Return 1 if the value on the left is greater
//Return -1 if the value on the right is greater
//echo (1 <=> 2);

//xor, true if either $a or $b is true, but not both
if (true xor true) {
    echo 'true';
} else {
    echo 'false';
}

//echo (1 xor true);
if (1 xor true) {
    echo 'true';
} else {
    echo 'false';
}
