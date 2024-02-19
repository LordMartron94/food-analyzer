<?php

namespace FoodAnalyzer\SqlHandling;

use FoodAnalyzer\SqlHandling\Model\Column;
use InvalidArgumentException;

class ColumnFactory
{
    private bool $_autoFixColumnName;

    public function __construct(bool $autoFixColumnName = true)
    {
        $this->_autoFixColumnName = $autoFixColumnName;
    }

    private function _ValidateColumnName(string $columnName): string
    {
        if (empty($columnName) && !$this->_autoFixColumnName)
            throw new InvalidArgumentException("Column name cannot be empty!");
        else if (empty($columnName))
            return "a";
        if (!$this->_autoFixColumnName && str_contains($columnName, ' '))
            throw new InvalidArgumentException("Column name cannot contain whitespace characters.");
        else if (str_contains($columnName, ' '))
            return str_replace(' ', '_', $columnName);
        return $columnName;
    }

    public function CreateVarChar(string $columnName, int $charValue): Column
    {
        $name = $this->_ValidateColumnName($columnName);
        $type = "varchar($charValue)";
        return new Column($name, $type);
    }

    public function CreateFloat(string $columnName): Column
    {
        $name = $this->_ValidateColumnName($columnName);
        $type = "float";
        return new Column($name, $type);
    }

    public function CreateInt(string $columnName): Column
    {
        $name = $this->_ValidateColumnName($columnName);
        $type = "int";
        return new Column($name, $type);
    }

    public function CreateBool(string $columnName): Column
    {
        $name = $this->_ValidateColumnName($columnName);
        $type = "bool";
        return new Column($name, $type);
    }
}