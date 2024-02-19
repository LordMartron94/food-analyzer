<?php
/*
 * Plugin Name: The Best Food Analyzer in Existence!
 */

use FoodAnalyzer\IngredientRepository;
use FoodAnalyzer\SqlHandling\ColumnFactory;

require_once "vendor/autoload.php";

add_action('admin_init', static function (){
    $factory = new ColumnFactory();
    $repo = new IngredientRepository($factory);
    $repo->create_table();
});
