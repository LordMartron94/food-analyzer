<?php
/*
 * Plugin Name: The Best Food Analyzer in Existence!
 */

use FoodAnalyzer\IngredientRepository;
use FoodAnalyzer\Init;
use FoodAnalyzer\SqlHandling\ColumnFactory;
use FoodAnalyzer\SqlHandling\Model\Column;

require_once "vendor/autoload.php";

//new Init();
//exit();

add_action('admin_init', static function (){
    $factory = new ColumnFactory();
    $repo = new IngredientRepository($factory);
    $repo->initialize();
});
