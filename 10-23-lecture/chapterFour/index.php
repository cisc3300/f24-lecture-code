<?php

require 'classes/Cat.php';
require 'classes/Dog.php';
require 'inheritance/Car.php';
require 'inheritance/Mustang.php';

use chapterFour\classes\Cat;
use chapterFour\classes\Dog;
use chapterFour\inheritance\Mustang;


//$dog1 = new Dog('Daisy', 12);
//$dog2 = new Dog('Sophie', 5);

//echo $dog1->name;
//echo $dog2->name;

//Cat::staticMethod();

//$cat = new Cat('pinecone', 13);

//$dog->bark();
//$cat->meow();

//static property, notice the :: syntax
//echo Cat::$breed;

//$mustang = new chapterFour\inheritance\Mustang();
$mustang = new Mustang();

$mustang->drive();