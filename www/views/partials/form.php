<form class="form" action="<?= $formData["action"] ?>" method="post">
  <input type="hidden" name="oldName" id="oldName" value="<?= isset($formData["oldName"]) ? urldecode($formData["oldName"]) : "" ?>">
  <div class="form-row">
    <div class="form-column">
      <label for="name">Назва:</label>
      <input type="text" name="name" id="name" value="<?= urldecode($formData["name"]) ?>" placeholder="Файл" required minlength="3" maxlength="50">
    </div>
  </div>
  <div class="form-row">
    <div class="form-column">
      <label for="text">Текст:</label>
      <textarea name="text" id="text" placeholder="Вміст файлу"><?= urldecode($formData["text"]) ?></textarea>
    </div>
  </div>
  <button>Надіслати</button>
</form>