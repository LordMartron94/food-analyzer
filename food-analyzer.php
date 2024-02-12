<?php
/*
 * Plugin Name: The Best Food Analyzer in Existence!
 */

use FoodAnalyzer\Loader\Init;

require_once "vendor/autoload.php";

$init = new Init();
$init->run();