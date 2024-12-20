<?php

declare(strict_types=1);

use FastRoute\RouteCollector;
use Middlewares\FastRoute;
use Middlewares\RequestHandler;
use Narrowspark\HttpEmitter\SapiEmitter;
use Relay\Relay;
use Laminas\Diactoros\ServerRequestFactory;
use function FastRoute\simpleDispatcher;

use App\Controller\IngredientController;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$container = include __DIR__ . '/../app/bootstrap.php';

$routes = simpleDispatcher(
    function (RouteCollector $r) {
        $r->get('/', ['App\Controller\MenuController', 'show']);
        $r->get('/calculator/menu[?{category}]', ['App\Controller\MenuController', 'fetchAllItems']);
        $r->get('/calculator/menu/{id:\d+}/ingredients[?{location}]', ['App\Controller\MenuController', 'fetchById']);
        $r->get('/calculator/ingredients', IngredientController::class);
        $r->post('/calculator/nutritional-info', ['App\Controller\NutritionalInfoController', 'calculateSummary']);
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
