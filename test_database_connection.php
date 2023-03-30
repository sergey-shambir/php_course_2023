<?php
declare(strict_types=1);

require_once __DIR__ . '/src/database.php';

$connection = connectDatabase();

$postId = savePostToDatabase($connection, new Post(
    null,
    'Новый пост',
    'Новый подзаголовок',
    'Текст-рыба для нового поста'
));

$post = findPostInDatabase($connection, $postId);
var_dump($post);
