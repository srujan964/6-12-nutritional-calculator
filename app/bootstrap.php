<?php

use DI\ContainerBuilder;

require __DIR__ . "/../vendor/autoload.php";


$containerBuilder = new ContainerBuilder();
$containerBuilder->useAutowiring(false);
$containerBuilder->useAttributes(false);
$containerBuilder->addDefinitions(__DIR__ . "/config.php");

/** @noinspection PhpUnhandledExceptionInspection */
$container = $containerBuilder->build();

return $container;
