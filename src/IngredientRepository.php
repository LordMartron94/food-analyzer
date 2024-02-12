<?php

namespace FoodAnalyzer;

class IngredientRepository
{
    public function initialize() {
        global $wpdb;
        $wpdb->query("CREATE TABLE wp_ingredients");
    }

    public function save() {
        global $wpdb;
        $wpdb->query();
    }
}