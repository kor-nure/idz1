<?php

$route = include __DIR__ . "/route.php";
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

if (!$isRouteFound) $handler = ["MainController", "not_found"];

[$controllerName, $actionName] = $handler;
include __DIR__ . "/../controllers/" . $controllerName . ".php";

$controller = new $controllerName();
$controller->$actionName(...$matches);
