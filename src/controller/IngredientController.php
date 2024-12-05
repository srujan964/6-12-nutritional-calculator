<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\IngredientRepository;
use Psr\Http\Message\ResponseInterface;

class IngredientController
{

    private ResponseInterface $response;

    private IngredientRepository $ingredientRepository;

    public function __construct(ResponseInterface $response, IngredientRepository $ingredientRepository)
    {
        $this->response = $response;
        $this->ingredientRepository = $ingredientRepository;
    }

    public function __invoke(): ResponseInterface
    {
        $response = $this->response->withHeader('Content-Type', 'application/json');
        $ingredients = $this->ingredientRepository->findAll();
        $response->getBody()->write(json_encode($ingredients));
        return $response;
    }
}
