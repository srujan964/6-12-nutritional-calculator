<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\MenuRepository;
use Laminas\Diactoros\ServerRequest;
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

    public function fetchAllItems(ServerRequest $request)
    {
        $response = $this->response->withHeader('Content-Type', 'application/json');
        $params = $request->getQueryParams();
        if ($params) {
            $category = $params['category'];

            $filteredMenuItems = $this->menuRepository->findByCategory($category);
            $this->response->getBody()->write(json_encode($filteredMenuItems));
            return $response;
        }

        $menuItems = $this->menuRepository->findAll();
        $this->response->getBody()->write(json_encode($menuItems));
        return $response;
    }

    public function fetchByCategory(ServerRequest $request)
    {
        $response = $this->response->withHeader('Content-Type', 'application/json');
        echo implode(',', $request->getQueryParams());
    }

    public function fetchById(ServerRequest $request)
    {
        $response = $this->response->withHeader('Content-Type', 'application/json');
        $path = explode('/', trim($request->getUri()->getPath(), '/'));
        $id = array_reverse($path)[1];

        $menu_item = $this->menuRepository->findByIdWithIngredients((int) $id);

        if (!$menu_item) {
            return $response->withStatus(404);
        }

        $response->getBody()->write(json_encode($menu_item));
        return $response;
    }


    public function show()
    {
        $response = $this->response->withHeader('Content-Type', 'text/html');
        $html = file_get_contents(__DIR__ . '/../../public/index.html');
        $response->getBody()->write($html);
        return $response;
    }
}
