<?php
declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\Database\ConnectionProvider;
use App\Database\PostTable;
use App\Model\Post;

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
