<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Добавление поста</title>
    <link rel="stylesheet" href="/css/add_post.css">
</head>
<body>
<form enctype="multipart/form-data" action="/add_post.php" method="post" class="add-post-form">
    <h2>Добавление поста</h2>
    <div class="form-row">
        <label for="title">Заголовок:</label>
        <input type="text" name="title" placeholder="Введите текст" id="title" required maxlength="200">
    </div>
    <div class="form-row">
        <label for="subtitle">Подзаголовок:</label>
        <input type="text" name="subtitle" placeholder="Введите текст" id="subtitle" maxlength="200">
    </div>
    <div class="form-row">
        <label for="content">Иллюстрация:</label>
        <input type="file" name="illustration" accept="image/jpeg, image/png, image/webp">
    </div>
    <div class="form-row">
        <label for="content">Содержание:</label>
        <textarea name="content" placeholder="Заголовок" id="content" required></textarea>
    </div>
    <div class="form-row">
        <button type="submit">Добавить пост</button>
    </div>
</form>
</body>
</html>
