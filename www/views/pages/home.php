<? include_once __DIR__ . "/../partials/header.php" ?>
<? include_once __DIR__ . "/../partials/sidebar.php" ?>

<main class="home">
  <h1 class="main-title">Список файлів</h1>
  <? if (isset($_SESSION["message"])) : ?>
    <p class="main-message">
      <span><?= $_SESSION["message"] ?></span>
    </p>
  <? endif; ?>
  <? session_unset(); ?>
  <div class="home-files">
    <? if (count($files) > 0) : ?>
      <ul class="home-files__list">
        <? foreach ($files as $name) : ?>
          <li class="home-files__item"><a href="/file/<?= $name ?>"><?= escapeHTML(urldecode($name)) ?></a></li>
        <? endforeach; ?>
      </ul>
    <? else : ?>
      <p>Доступних файлів немає. <a href="/create">Створити файл</a></p>
    <? endif; ?>
  </div>
</main>