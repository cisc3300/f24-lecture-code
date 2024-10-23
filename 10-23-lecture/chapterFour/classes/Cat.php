<?php

namespace chapterFour\classes;
class Cat
{
    public string $name;
    public int $age;
    protected string $protectedString;

    //static property, do not need an instance of cat to access this property
    public static $breed = 'Maine Coon';

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    //setter
    public function setProtectedString($protectedString)
    {
        $this->protectedString = $protectedString;
    }

    //getter
    public function getProtectedString()
    {
        return $this->protectedString;
    }

    public function meow()
    {
        echo 'meow';
    }
}