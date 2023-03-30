<?php
declare(strict_types=1);

require_once __DIR__ . '/../src/response.php';
require_once __DIR__ . '/../src/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST')
{
    writeRedirectSeeOther('/');
    exit();
}

function handleAddPost()
{
    $post = new Post(
        null,
        $_POST['title'],
        $_POST['subtitle'],
        $_POST['content'],
    );
    $connection = connectDatabase();
    $postId = savePostToDatabase($connection, $post);
    writeRedirectSeeOther("/show_post.php?post_id=$postId");
}

handleAddPost();
