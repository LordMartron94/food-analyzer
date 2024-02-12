<?php

namespace FoodAnalyzer\SqlHandling;

use FoodAnalyzer\DictionaryType;

class SqlApi
{
    public function createTable(string $tableName, iterable $columns) : void
    {
        $collection = new DictionaryType();
        $collection->append();
    }
}