<?php

preg_match("/\/([^?]*)/", $_SERVER["REQUEST_URI"], $matches);
$route = $matches[1];
$routes = include __DIR__ . "/routes.php";

$isRouteFound = false;
foreach ($routes as $pattern => $handler) {
  preg_match($pattern, $route, $matches);
  if (!empty($matches)) {
    $isRouteFound = true;
    unset($matches[0]);
    break;
  }
}

if (!$isRouteFound) $handler = ["MainController", "error"];

[$controllerName, $actionName] = $handler;
include_once __DIR__ . "/../controllers/" . $controllerName . ".php";

$controller = new $controllerName();
$controller->$actionName(...$matches);
