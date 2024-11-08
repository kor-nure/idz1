<?php

include __DIR__ . "/ViewController.php";

class FileController
{
  private $viewController;

  public function __construct()
  {
    $this->viewController = new ViewController();
  }

  public function get(string $slug)
  {
    $this->viewController->render("file", ["slug" => $slug]);
  }
}
