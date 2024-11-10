<?php

include_once __DIR__ . "/ViewController.php";
include_once __DIR__ . "/../models/FileModel.php";

class MainController
{
  private $viewController;
  private $fileModel;

  public function __construct()
  {
    $this->viewController = new ViewController();
    $this->fileModel = new FileModel();
  }

  public function get()
  {
    $data = $this->fileModel->getAll();

    $this->viewController->render("home", $data);
  }

  public function error()
  {
    http_response_code(404);
    $this->viewController->render("404");
  }
}
