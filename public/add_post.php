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
    throw new RuntimeException('Simulated error');

    $illustrationInfo = $FILES['illustration'];
    $illustrationPath = moveImageToUploads($illustrationInfo);

    $postData = [
        'title' => $_POST['title'],
        'subtitle' => $_POST['subtitle'],
        'content' => $_POST['content'],
    ];
    $connection = connectDatabase();
    $postId = savePostToDatabase($connection, $postData);
    writeRedirectSeeOther("/show_post.php?post_id=$postId");
}

handleAddPost();
