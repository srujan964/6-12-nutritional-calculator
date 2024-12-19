<?php

declare(strict_types=1);

namespace App\Controller;

use Laminas\Diactoros\ServerRequest;
use Psr\Http\Message\ResponseInterface;

use App\Service\NutritionalInfoService;

class NutritionalInfoController
{
    private ResponseInterface $response;
    private NutritionalInfoService $nutritionalInfoService;

    public function __construct(ResponseInterface $response, NutritionalInfoService $service)
    {
        $this->response = $response;
        $this->nutritionalInfoService = $service;
    }

    public function calculateSummary(ServerRequest $request)
    {
        $body = (string) $request->getBody();
        $selections = json_decode($body, true)['selections'];

        $result = $this->nutritionalInfoService->summarize($selections);
        $response = $this->response->withHeader('Content-Type', 'application/json');
        $response->getBody()->write(json_encode($result));
        return $response;
    }
}
