<? include_once __DIR__ . "/../partials/header.php" ?>
<? include_once __DIR__ . "/../partials/sidebar.php" ?>

<main class="edit">
  <h1 class="main-title">Редагувати файл '<a href="/file/<?= $name ?>"><?= escapeHTML(urldecode($name)) ?></a>'</h1>
  <? if (isset($_SESSION["message"])) : ?>
    <p class="main-message<?= !isset($_SESSION["data"]) ? " error" : "" ?>">
      <span><?= $_SESSION["message"] ?></span>
    </p>
  <? endif; ?>
  <? session_unset(); ?>
  <? $formData = [
    "action" => "/api/edit",
    "oldName" => $name,
    "name" => $name,
    "text" => $text,
  ]; ?>
  <? include_once __DIR__ . "/../partials/form.php"; ?>
</main>