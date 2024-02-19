<?php

namespace FoodAnalyzer\SqlHandling\Model;

use InvalidArgumentException;

class Column
{

    private string $columnName;

    private string $columnType;

    public function __construct(string $columnName, string $columnType)
    {
        $this->columnName = $columnName;
        $this->columnType = $columnType;

        $this->validate();
    }

    private function validate():void
    {
        if ( '' === $this->columnName) {
            throw new InvalidArgumentException("Column name cannot be empty.");
        }
        if (str_contains($this->columnName, ' ')) {
            throw new InvalidArgumentException("Column name cannot contain whitespace characters.");
        }
    }

    public function getColumnName(): string
    {
        return $this->columnName;
    }

    public function getColumnType(): string
    {
        return $this->columnType;
    }
}