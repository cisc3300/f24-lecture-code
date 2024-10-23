<?php

namespace app\core;

Trait Model
{
    use Database;

    public function findAll()
    {
        $query = "select * from $this->table";
        return $this->query($query);
    }



}