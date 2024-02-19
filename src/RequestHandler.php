<?php

namespace FoodAnalyzer;

interface RequestHandler
{

    public function handle(Request $request): Response;

}