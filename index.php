<?php
use controllers\Router;
use controllers\Request;
use controllers\HomeController;
use controllers\AboutController;
use controllers\ContactController;

$request_uri = $_SERVER['REQUEST_URI'];

require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/controllers/Request.php');
require_once(__DIR__ . '/controllers/Router.php');

spl_autoload_register(function ($className) {
    $classPath = __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';
    if (file_exists($classPath)) {
        require_once $classPath;
    }
});
spl_autoload_register(function ($class) {
    $prefix = 'controllers\\';
    $baseDir = __DIR__ . '/controllers/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    $relativeClass = substr($class, $len);
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});
$routes = [
    '/' => ['controller' => 'HomeController', 'method' => 'index'],
    '/about' => ['controller' => 'AboutController', 'method' => 'index'],
    '/contact' => ['controller' => 'ContactController', 'method' => 'index']
];
$request = new Request();
$router = new Router();
$request_method = $_SERVER['REQUEST_METHOD'];
$route = $router->getRoute();

echo 'Route: ' . print_r($route, true) . '<br>';

if ($route !== null && isset($routes[$route['uri']])) {
    $route = $routes[$route['uri']];
    $controllerClass = $route['controller'];
    require_once(__DIR__ . '/controllers/' . $controllerClass . '.php');
    $method = $route['method'];
    $router->addRoute($route['uri'], $controllerClass . '@' . $method);

}
require_once(__DIR__ . '/header.php');
$router->run();
require_once(__DIR__ . '/footer.php');