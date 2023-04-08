<?php
declare(strict_types=1);

require_once __DIR__ . '/../src/response.php';
require_once __DIR__ . '/../src/database.php';
require_once __DIR__ . '/../src/upload.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST')
{
    writeRedirectSeeOther('/');
    exit();
}

function handleAddPost()
{
    $illustrationPath = moveImageToUploads($_FILES['illustration']);

    $postData = [
        'title' => $_POST['title'],
        'subtitle' => $_POST['subtitle'],
        'illustration' => $illustrationPath,
        'content' => $_POST['content'],
    ];
    $connection = connectDatabase();
    $postId = savePostToDatabase($connection, $postData);

    writeRedirectSeeOther("/show_post.php?post_id=$postId");
}

handleAddPost();
