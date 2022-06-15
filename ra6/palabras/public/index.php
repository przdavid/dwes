<?php
require_once("../app/Config/params.php");
require_once("../vendor/autoload.php");

use App\Controllers\PalabraController;
use App\Core\Router;

$router = new Router();

$router->add(array(
    'name'=>'', 
    'path'=>'/^\/$/', 
    'action'=>[PalabraController::class, 'Index']));


$request = str_replace(DIRPUBLIC,'',$_SERVER['REQUEST_URI']);
$route = $router->match($request);
    
if($route) {
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];
    $controller = new $controllerName;
    $controller->$actionName($request);
    
} else {
    echo "No route matched";
}
?>