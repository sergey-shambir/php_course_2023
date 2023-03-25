<?php
/**
 * @var string[] $post
 * @var string[] $subtitle
 * @var string[] $content
 */
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <title><?= $post['title'] ?></title>
    <link rel="stylesheet" href="/css/show_post.css">
</head>
<body>
<div class="post-content">
    <h1><?= $post['title'] ?></h1>
    <?php if ($post['subtitle']): ?>
        <h2><?= $post['subtitle'] ?></h2>
    <?php endif; ?>
    <p><?= $post['content'] ?></p>
</div>
</body>
</html>
