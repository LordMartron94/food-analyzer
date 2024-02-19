<?php

declare(strict_types=1);

namespace FoodAnalyzer\RequestHandler;

use FoodAnalyzer\Request;
use FoodAnalyzer\IRequestHandler;
use FoodAnalyzer\Response;

class CreateDatabaseScheme implements IRequestHandler
{

    public function __construct()
    {
    }

    public function is_request( Request $request):bool
    {
        return 'create-database' === $request->get('action');
    }

    public function handle(Request $request): Response
    {
        return new Response('success');
    }

}