<?php

use chapterFour\classes\Cat;
use chapterFour\classes\Dog;
//use chapterFour\inheritance\Mustang;


$dog = new Dog('Daisy', 12);
//$cat = new Cat('pinecone', 13);

$dog->bark();
//$cat->meow();

//static property, notice the :: syntax
//echo Cat::$breed;

//$mustang = new Mustang();

//$mustang->drive();