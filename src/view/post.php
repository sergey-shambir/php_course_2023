<?php
/**
 * @var Post $post
 */
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <title><?= $post->getTitle() ?></title>
    <link rel="stylesheet" href="/css/show_post.css">
</head>
<body>
<div class="post-content">
    <h1><?= htmlentities($post->getTitle()) ?></h1>
    <?php if ($post['subtitle']): ?>
        <h2><?= htmlentities($post->getSubtitle()) ?></h2>
    <?php endif; ?>
    <p><?= htmlentities($post->getContent()) ?></p>
</div>
</body>
</html>
