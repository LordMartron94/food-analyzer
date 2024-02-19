<?php

declare(strict_types=1);

namespace FoodAnalyzer;

class Request
{

    private array $data;

    public function __construct()
    {
        $this->data = $_GET;
    }

    public function get(string $var)
    {
        return $this->data[$var] ?? null;
    }

}