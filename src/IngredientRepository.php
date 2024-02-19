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
        $query = "CREATE TABLE mdvdh_ingredients (";

        $definitions = [];

        // Extracting first column
        $firstCol = array_shift($columns);
        $pkName = $firstCol->getColumnName();
        $pkType = $firstCol->getColumnType();
        $definitions[] = "$pkName $pkType PRIMARY KEY";

        // Adding the rest columns
        foreach ($columns as $column)
        {
            $name = $column->getColumnName();
            $type = $column->getColumnType();
            $definitions[] = "$name $type";
        }

        $query .= "\n" . implode(",\n", $definitions);
        $query .= "\n);";

        return $query;
    }

    public function initialize(): void
    {
        global $wpdb;

        $columns = [
            $this->_columnFactory->CreateInt("IngredientID"),
            $this->_columnFactory->CreateVarChar("Ingredient_Name", 100),
            $this->_columnFactory->CreateInt("Calories_Per_Serve"),

            // Nutrients
            $this->_columnFactory->CreateFloat("Protein_Per_Serve"),
            $this->_columnFactory->CreateFloat("Carbohydrates_Per_Serve"),
            $this->_columnFactory->CreateFloat("Fiber_Per_Serve"),
            $this->_columnFactory->CreateFloat("Fats_Per_Serve"),

            // Vitamins
            $this->_columnFactory->CreateFloat("VitaminA_Percent_DV"),
            $this->_columnFactory->CreateFloat("VitaminC_Percent_DV"),
            $this->_columnFactory->CreateFloat("VitaminD_Percent_DV"),
            $this->_columnFactory->CreateFloat("VitaminE_Percent_DV"),
            $this->_columnFactory->CreateFloat("VitaminK_Percent_DV"),
            $this->_columnFactory->CreateFloat("B1_Percent_DV"),
            $this->_columnFactory->CreateFloat("B2_Percent_DV"),
            $this->_columnFactory->CreateFloat("B3_Percent_DV"),
            $this->_columnFactory->CreateFloat("B6_Percent_DV"),
            $this->_columnFactory->CreateFloat("B12_Percent_DV"),

            // Minerals
            $this->_columnFactory->CreateFloat("Calcium_Percent_DV"),
            $this->_columnFactory->CreateFloat("Iron_Percent_DV"),
            $this->_columnFactory->CreateFloat("Magnesium_Percent_DV"),
            $this->_columnFactory->CreateFloat("Potassium_Percent_DV"),
            $this->_columnFactory->CreateFloat("Zinc_Percent_DV"),

            // Others
            $this->_columnFactory->CreateVarChar("Serving_Type", 100),
            $this->_columnFactory->CreateInt("Serve_Value"),
            $this->_columnFactory->CreateBool("Contains_Dairy"),
            $this->_columnFactory->CreateBool("Contains_Gluten"),
            $this->_columnFactory->CreateBool("Contains_Nuts"),
            $this->_columnFactory->CreateVarChar("Source", 100)
        ];

        $query = $this->_table_query($columns);
        $queryResult = $wpdb->query($query);

        echo '<pre>'; print_r( $query ); echo '</pre>';
        echo '<pre>'; print_r( $queryResult ); echo '</pre>';
        echo '<pre>'; print_r( $wpdb->last_error ); echo '</pre>'; exit;
    }

    public function save()
    {
        global $wpdb;
        $wpdb->query();
    }
}