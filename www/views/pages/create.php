<? include_once __DIR__ . "/../partials/header.php" ?>
<? include_once __DIR__ . "/../partials/sidebar.php" ?>

<main class="create">
  <h1 class="main-title">Створити файл</h1>
  <? if (isset($_SESSION["message"])) : ?>
    <p class="main-message<?= !isset($_SESSION["data"]) ? " error" : "" ?>">
      <span><?= $_SESSION["message"] ?></span>
      <? if (isset($_SESSION["data"])) : ?>
        <a href="/file/<?= $_SESSION["data"]["name"] ?>">Переглянути</a>
      <? endif; ?>
    </p>
  <? endif; ?>
  <? session_unset(); ?>
  <? $formData = [
    "action" => "/api/create",
    "name" => "",
    "text" => "",
  ]; ?>
  <? include_once __DIR__ . "/../partials/form.php"; ?>
</main>