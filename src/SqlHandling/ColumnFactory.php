<?php

namespace FoodAnalyzer\SqlHandling;

use FoodAnalyzer\SqlHandling\Model\Column;
use InvalidArgumentException;

class ColumnFactory
{

    public function createVarChar(string $columnName, int $charValue): Column
    {
        return new Column(
            $columnName,
            "varchar($charValue)"
        );
    }

    public function createFloat(string $columnName): Column
    {
        return new Column(
            $columnName,
            "float"
        );
    }

    public function CreateInt(string $columnName): Column
    {
        return new Column($columnName, "int");
    }

    public function CreateBool(string $columnName): Column
    {
        return new Column($columnName, "bool");
    }
}