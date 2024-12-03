<?php
session_start();

$entityManager = require_once __DIR__ . '/../config/bootstrap.php';

$routes = require_once __DIR__ . '/../config/routes.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (!isset($routes[$uri])) {
    $errorController = new \App\Controllers\ErrorController();
    $errorController->error404();
    exit;
}

[$controllerName, $action] = $routes[$uri];
$controllerClass = "App\\Controllers\\{$controllerName}";

try {
    $controller = new $controllerClass($entityManager);
    $controller->$action();
} catch (\Exception $e) {
    error_log($e->getMessage());
    $errorController = new \App\Controllers\ErrorController();
    $errorController->error404();
}