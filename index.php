<?php
require_once "rotas.php";
require_once 'helpers/utils.class.php';
// Função para carregar automaticamente as classes necessárias.
spl_autoload_register(function ($class) {
    $controllerPath = 'controllers/' . $class . '.class.php';
    $modelPath = 'models/' . $class . '.class.php';

    Utils::loadEnv(__DIR__ . '/.env');
    
    if (file_exists($controllerPath)) {
        require_once $controllerPath;
    } elseif (file_exists($modelPath)) {
        require_once $modelPath;
    } else {
        throw new Exception("Class $class not found.");
    }
});

// Serve para pegar o caminho da rota da url.

// $uri = parse_url($_SERVER["REQUEST_URI"])["path"];
$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

$uri = substr($uri, strpos($uri, '/', 1));

$router->instancia_rota($_SERVER["REQUEST_METHOD"], $uri);

?>