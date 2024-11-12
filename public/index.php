<?php
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////// CONFIGURATION //////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>



<?php
// Recupérer l'entityManager
$entityManager = require_once __DIR__ . '/../config/bootstrap.php';


// Récupération des routes
$routes = require_once __DIR__ . '/../config/routes.php'; // On inclu le fichier de route et on le met dans un tableau

// Récupération de l'URL actuelle
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // On récupère la partie route

// Recherche de la route correspondante
if (!isset($routes[$uri])) {
$errorController = new \App\Controllers\ErrorController();
$errorController->error404();
exit;
}

// Récupération du contrôleur et de l'action
[$controllerName, $action] = $routes[$uri]; // Destructuring
$controllerClass = "App\\Controllers\\{$controllerName}";

try {
    // Instanciation du contrôleur et appel de l'action
    $controller = new $controllerClass($entityManager);
    $controller->$action();
} catch (\Exception $e) {
    error_log($e->getMessage());
    $errorController = new \App\Controllers\ErrorController();
    $errorController->error404();
}

?>
