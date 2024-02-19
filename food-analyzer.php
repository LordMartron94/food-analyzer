<?php
/*
 * Plugin Name: The Best Food Analyzer in Existence!
 */

use FoodAnalyzer\IngredientRepository;
use FoodAnalyzer\Request;
use FoodAnalyzer\RequestHandler\CreateDatabaseScheme;
use FoodAnalyzer\SqlHandling\ColumnFactory;
use FoodAnalyzer\View\TestForm;
use FoodAnalyzer\View\TestLink;

require_once "vendor/autoload.php";

add_action('admin_init', static function (){
    $test = new CreateDatabaseScheme();
    if ($test->is_request(new Request())) {
        echo $test->handle(new Request());
    }

    $form = new TestForm();
    $form->render();

    $form2 = new TestLink();
    $form2->render();
    exit;
});
