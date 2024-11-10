<?php

class ViewController
{
  public function render(string $page, array $vars = [], string $layout = "layout")
  {
    extract($vars);

    ob_start();
    include __DIR__ . "/../views/pages/" . $page . ".php";
    $content = ob_get_clean();

    include __DIR__ . "/../views/" . $layout . ".php";
  }
}
