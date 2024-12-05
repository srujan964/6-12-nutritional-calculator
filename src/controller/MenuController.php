<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\MenuRepository;
use Psr\Http\Message\ResponseInterface;

class MenuController
{
    private ResponseInterface $response;
    private MenuRepository $menuRepository;

    public function __construct(ResponseInterface $response, MenuRepository $menuRepository)
    {
        $this->response = $response;
        $this->menuRepository = $menuRepository;
    }

    public function __invoke()
    {
        $response = $this->response->withHeader('Content-Type', 'application/json');
        $menu_items = $this->menuRepository->findAll();
        $this->response->getBody()->write(json_encode($menu_items));
        return $response;
    }
}
