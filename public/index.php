<?php

declare(strict_types=1);

use App\Controller\IngredientController;
use App\Controller\MenuController;
use FastRoute\RouteCollector;
use Middlewares\FastRoute;
use Middlewares\RequestHandler;
use Narrowspark\HttpEmitter\SapiEmitter;
use Relay\Relay;
use Laminas\Diactoros\ServerRequestFactory;
use function FastRoute\simpleDispatcher;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$container = include __DIR__ . '/../app/bootstrap.php';

$routes = simpleDispatcher(
    function (RouteCollector $r) {
        $r->get('/ingredients', IngredientController::class);
        $r->get('/menu', MenuController::class);
    }
);

$middlewareQueue[] = new FastRoute($routes);
$middlewareQueue[] = new RequestHandler($container);

/**
 * @noinspection PhpUnhandledExceptionInspection
*/
$requestHandler = new Relay($middlewareQueue);
$response = $requestHandler->handle(ServerRequestFactory::fromGlobals());

$emitter = new SapiEmitter();
/**
 * @noinspection PhpVoidFunctionResultUsedInspection
*/
return $emitter->emit($response);
