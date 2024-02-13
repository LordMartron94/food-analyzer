<?php
/*
 * Plugin Name: The Best Food Analyzer in Existence!
 */

use FoodAnalyzer\IngredientRepository;
use FoodAnalyzer\Init;
use FoodAnalyzer\SqlHandling\Model\Column;

require_once "vendor/autoload.php";

//new Init();
//exit();

//$repo = new IngredientRepository();
$factory = new \FoodAnalyzer\SqlHandling\ColumnFactory();

$column = $factory->CreateVarChar("", 255);

echo $column->getColumnName() . " " . $column->getColumnType();

//echo $repo->initialize($columns);
