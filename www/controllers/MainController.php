<?php

include __DIR__ . "/ViewController.php";

class MainController
{
  private $viewController;

  public function __construct()
  {
    $this->viewController = new ViewController();
  }

  public function get()
  {
    $this->viewController->render("home");
  }

  public function not_found()
  {
    $this->viewController->render("404");
  }
}
