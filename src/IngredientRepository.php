<?php

namespace FoodAnalyzer;

use FoodAnalyzer\SqlHandling\ColumnFactory;

class IngredientRepository
{

    private ColumnFactory $_columnFactory;

    public function __construct(ColumnFactory $columnFactory)
    {
        $this->_columnFactory = $columnFactory;
    }

    private function _table_query(array $columns): string
    {
        $definitions = [];

        // Extracting first column
        $firstCol = array_shift($columns);
        $pkName = $firstCol->getColumnName();
        $pkType = $firstCol->getColumnType();
        $definitions[] = "$pkName $pkType PRIMARY KEY";

        // Adding the rest columns
        foreach ($columns as $column) {
            $definitions[] = $column->getColumnName() . " " . $column->getColumnType();
        }

        return sprintf("CREATE TABLE mdvdh_ingredients(%s);", implode(",\n", $definitions));
    }

    public function create_table(): void
    {
        global $wpdb;

        $columns = [
            $this->_columnFactory->CreateInt("IngredientID"),
            $this->_columnFactory->createVarChar("Ingredient_Name", 100),
            $this->_columnFactory->CreateInt("Calories_Per_Serve"),

            // Nutrients
            $this->_columnFactory->createFloat("Protein_Per_Serve"),
            $this->_columnFactory->createFloat("Carbohydrates_Per_Serve"),
            $this->_columnFactory->createFloat("Fiber_Per_Serve"),
            $this->_columnFactory->createFloat("Fats_Per_Serve"),

            // Vitamins
            $this->_columnFactory->createFloat("VitaminA_Percent_DV"),
            $this->_columnFactory->createFloat("VitaminC_Percent_DV"),
            $this->_columnFactory->createFloat("VitaminD_Percent_DV"),
            $this->_columnFactory->createFloat("VitaminE_Percent_DV"),
            $this->_columnFactory->createFloat("VitaminK_Percent_DV"),
            $this->_columnFactory->createFloat("B1_Percent_DV"),
            $this->_columnFactory->createFloat("B2_Percent_DV"),
            $this->_columnFactory->createFloat("B3_Percent_DV"),
            $this->_columnFactory->createFloat("B6_Percent_DV"),
            $this->_columnFactory->createFloat("B12_Percent_DV"),

            // Minerals
            $this->_columnFactory->createFloat("Calcium_Percent_DV"),
            $this->_columnFactory->createFloat("Iron_Percent_DV"),
            $this->_columnFactory->createFloat("Magnesium_Percent_DV"),
            $this->_columnFactory->createFloat("Potassium_Percent_DV"),
            $this->_columnFactory->createFloat("Zinc_Percent_DV"),

            // Others
            $this->_columnFactory->createVarChar("Serving_Type", 100),
            $this->_columnFactory->CreateInt("Serve_Value"),
            $this->_columnFactory->CreateBool("Contains_Dairy"),
            $this->_columnFactory->CreateBool("Contains_Gluten"),
            $this->_columnFactory->CreateBool("Contains_Nuts"),
            $this->_columnFactory->createVarChar("Source", 100),
        ];

        $query = $this->_table_query($columns);
        $queryResult = $wpdb->query($query);

        echo '<pre>';
        print_r($query);
        echo '</pre>';
        echo '<pre>';
        print_r($queryResult);
        echo '</pre>';
        echo '<pre>';
        print_r($wpdb->last_error);
        echo '</pre>';
        exit;
    }

    public function save():void
    {
        global $wpdb;
        $wpdb->query();
    }
}