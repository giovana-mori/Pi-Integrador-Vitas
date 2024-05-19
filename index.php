<?php
require_once "rotas.php";

// Serve para carregar automaticamente as classes necessárias.
spl_autoload_register(function ($class) {
	if (file_exists('controllers/' . $class . '.class.php'))
		require_once 'controllers/' . $class . '.class.php';
	else
		require_once 'models/' . $class . '.class.php';
});

// Serve para pegar o caminho da rota da url.

$uri = parse_url($_SERVER["REQUEST_URI"])["path"];

$uri = substr($uri, strpos($uri, '/', 1));

$router->instancia_rota($_SERVER["REQUEST_METHOD"], $uri);

?>