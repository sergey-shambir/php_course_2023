<?php
declare(strict_types=1);

require_once __DIR__ . '/src/Database/ConnectionProvider.php';
require_once __DIR__ . '/src/Database/PostTable.php';
require_once __DIR__ . '/src/Model/Post.php';

$connection = ConnectionProvider::connectDatabase();
$postTable = new PostTable($connection);

$postId = $postTable->add(new Post(
    null,
    'Новый пост',
    'Новый подзаголовок',
    'Текст-рыба для нового поста'
));

$post = $postTable->find($postId);
var_dump($post);
