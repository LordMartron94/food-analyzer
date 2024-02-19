<?php

namespace FoodAnalyzer\View;

class TestForm
{
    public function render(): void{ ?>

        <form method="get" action="">
            <label>Action:
                <input type="text" name="action">
            </label>
            <input type="submit" value="Submit">
        </form> <?php
    }
}