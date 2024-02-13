<?php

namespace FoodAnalyzer\SqlHandling\Model;

class Column
{
    private string $_columnName;
    private string $_columnType;

    public function __construct(string $columnName, string $columnType)
    {
        $this->_columnName = $columnName;
        $this->_columnType = $columnType;
    }

    public function getColumnName(): string
    {
        return $this->_columnName;
    }

    public function getColumnType(): string
    {
        return $this->_columnType;
    }
}