<? include_once __DIR__ . "/../partials/header.php" ?>
<?php include_once __DIR__ . "/../partials/sidebar.php" ?>

<main class="file">
  <h1 class="main-title">Файл '<?= escapeHTML(urldecode($name)) ?>'</h1>
  <div class="file-nav">
    <a href="/edit/<?= $name ?>">Редагувати</a> |
    <form class="file-nav__form" action="/api/delete" method="POST">
      <input type="hidden" name="name" id="name" value="<?= urldecode($name) ?>">
      <button type="submit" onclick="return confirm('Ви впевнені, що хочете видалити цей файл?')">Видалити</button>
    </form>
  </div>
  <div class="file-text">
    <?php if ($text) { ?>
      <p><?= escapeHTML($text) ?></p>
    <?php } else { ?>
      <p>Файл пустий.</p>
    <?php } ?>
  </div>
</main>