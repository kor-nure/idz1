<?php

include_once __DIR__ . "/ViewController.php";
include_once __DIR__ . "/MainController.php";
include_once __DIR__ . "/../models/FileModel.php";

class FileController
{
  private $viewController;
  private $mainController;
  private $fileModel;

  public function __construct()
  {
    $this->viewController = new ViewController();
    $this->mainController = new MainController();
    $this->fileModel = new FileModel();
  }

  public function get(string $name)
  {
    if ($name) {
      $data = $this->fileModel->getOne($name);

      if (!empty($data)) {
        $this->viewController->render("file", $data);
        return;
      }
    }

    $this->mainController->error();
  }

  public function create()
  {
    $this->viewController->render("create");
  }

  public function edit(string $name)
  {
    if ($name) {
      $data = $this->fileModel->getOne($name);

      if (!empty($data)) {
        $this->viewController->render("edit", $data);
        return;
      }
    }

    $this->mainController->error();
  }

  public function apiCreate()
  {
    if (!isset($_POST["name"]) || strlen($_POST["name"]) < 3 || strlen($_POST["name"]) > 50) {
      header("Location: /");
      return;
    }

    $name = $_POST["name"];
    $text = $_POST["text"];

    $data = $this->fileModel->create($name, $text);

    if ($data) {
      $_SESSION["message"] = "Файл створено.";
      $_SESSION["data"] = $data;
    } else {
      $_SESSION["message"] = "Файл з такою назвою вже існує.";
    }

    header("Location: /create");
  }

  public function apiEdit()
  {
    if (!isset($_POST["oldName"]) || !isset($_POST["name"]) || strlen($_POST["name"]) < 3 || strlen($_POST["name"]) > 50) {
      header("Location: /");
      return;
    }

    $oldName = $_POST["oldName"];
    $name = $_POST["name"];
    $text = $_POST["text"];

    $data = $this->fileModel->edit($oldName, $name, $text);

    if ($data) {
      $_SESSION["message"] = "Файл оновлено.";
      $_SESSION["data"] = $data;

      header("Location: /edit/{$name}");
    } else {
      $_SESSION["message"] = "Файл з такою назвою вже існує.";

      header("Location: /edit/{$oldName}");
    }
  }

  public function apiDelete()
  {
    if (!isset($_POST["name"])) {
      header("Location: /");
      return;
    }

    $name = $_POST["name"];

    $data = $this->fileModel->delete($name);

    if ($data) {
      $_SESSION["message"] = "Файл видалено.";
      $_SESSION["data"] = $data;
    } else {
      $_SESSION["message"] = "Файл з такою назвою не існує.";
    }

    header("Location: /");
  }
}
