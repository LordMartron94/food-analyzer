<?php

declare(strict_types=1);

namespace FoodAnalyzer;

class Response
{

    private string $html;

    public function __construct(string $html)
    {
        $this->html = $html;
    }

    public function __toString(): string
    {
        return $this->html;
    }

}