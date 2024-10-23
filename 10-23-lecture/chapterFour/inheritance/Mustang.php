<?php

namespace chapterFour\inheritance;

class Mustang extends Car {

    public function doMustangThings() {
        echo "this is a mustang";
    }

//  this is an example of polymorphism
    public function drive() {
        echo "mustang specific drive";
    }
}