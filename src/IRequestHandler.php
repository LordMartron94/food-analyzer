<?php

namespace FoodAnalyzer;

interface IRequestHandler
{

    public function handle(Request $request): Response;

}