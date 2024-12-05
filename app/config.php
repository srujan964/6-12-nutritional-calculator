<?php

declare(strict_types=1);

use App\Controller\IngredientController;
use App\Controller\MenuController;
use App\MainPage;
use App\HelloWorld;
use App\Repository\IngredientRepository;
use App\Repository\IngredientRepositoryImpl;
use App\Repository\MenuRepository;
use App\Repository\MenuRepositoryImpl;
use Laminas\Diactoros\Response;

use function DI\create;
use function DI\get;

return [
    IngredientController::class => create(IngredientController::class)
        ->constructor(get('Response'), get(IngredientRepository::class)),
    IngredientRepository::class => create(IngredientRepositoryImpl::class)
        ->constructor(get(PDO::class)),
    MenuController::class => create(MenuController::class)
        ->constructor(get('Response'), get(MenuRepository::class)),
    MenuRepository::class => create(MenuRepositoryImpl::class)
        ->constructor(get(PDO::class)),
    PDO::class => function (): PDO {
        $db = "mysql:host=" . getenv("DB_HOST") . ";dbname=" . getenv("DB_NAME") . ";charset=utf8mb4";
        $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $username = getenv("DB_USER");
        $password = getenv("DB_PASSWORD_FILE") ? rtrim(file_get_contents(getenv("DB_PASSWORD_FILE"))) : "";
        return new PDO($db, $username, $password);
    },
    'Foo' => 'bar',
    'Response' => function () {
        return new Response();
    }
];
