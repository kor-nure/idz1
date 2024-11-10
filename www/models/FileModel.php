<?php

class FileModel
{
  public $dirName;

  public function __construct()
  {
    $this->dirName = __DIR__ . "/../files/";
    if (!is_dir($this->dirName)) mkdir($this->dirName);
  }

  public function getAll()
  {
    $files = scandir($this->dirName);
    $files = array_filter($files, function ($item) {
      return $item[0] !== '.';
    });

    return [
      "files" => $files
    ];
  }

  public function getOne(string $name)
  {
    $name = urlencode(urldecode($name));

    $path = $this->dirName . $name;
    $data = [];

    if (file_exists($path)) {
      $file = fopen($path, "r");
      $text = fread($file, filesize($path) + 1);
      fclose($file);

      $data = [
        "name" => $name,
        "text" => $text,
      ];
    }

    return $data;
  }

  public function create(string $name, string $text)
  {
    $name = urlencode(urldecode($name));

    $path = $this->dirName . $name;
    $data = [];

    if (!file_exists($path)) {
      $file = fopen($path, "w");
      fwrite($file, $text);
      fclose($file);

      $data = [
        "name" => $name,
        "text" => $text,
      ];
    }

    return $data;
  }

  public function edit(string $oldName, string $name, string $text)
  {
    $oldName = urlencode(urldecode($oldName));
    $name = urlencode(urldecode($name));

    $oldPath = $this->dirName . $oldName;
    $path = $this->dirName . $name;
    $data = [];

    if (file_exists($oldPath) && ($oldPath === $path || !file_exists($path))) {
      rename($oldPath, $path);
      $file = fopen($path, "w");
      fwrite($file, $text);
      fclose($file);

      $data = [
        "name" => $name,
        "text" => $text,
      ];
    }

    return $data;
  }

  public function delete(string $name)
  {
    $name = urlencode(urldecode($name));

    $path = $this->dirName . $name;
    $data = [];

    if (file_exists($path)) {
      unlink($path);

      $data = [
        "name" => $name,
      ];
    }

    return $data;
  }
}
