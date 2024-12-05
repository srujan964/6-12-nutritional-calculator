<?php

declare(strict_types=1);

use App\Controller\IngredientController;
use App\MainPage;
use App\HelloWorld;
use App\Repository\IngredientRepository;
use App\Repository\IngredientRepositoryImpl;
use Laminas\Diactoros\Response;

use function DI\create;
use function DI\get;

return [
    MainPage::class => create(MainPage::class)
        ->constructor(get('Response')),
    HelloWorld::class => create(HelloWorld::class)
        ->constructor(get('Foo'), get('Response')),
    IngredientController::class => create(IngredientController::class)
        ->constructor(get('Response'), get(IngredientRepository::class)),
    IngredientRepository::class => create(IngredientRepositoryImpl::class)
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
