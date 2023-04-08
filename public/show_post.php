<?php
declare(strict_types=1);

require_once __DIR__ . '/../src/response.php';
require_once __DIR__ . '/../src/database.php';
require_once __DIR__ . '/../src/upload.php';

if ($_SERVER['REQUEST_METHOD'] !== 'GET')
{
    writeRedirectSeeOther('/');
    exit();
}

$postId = (int)$_GET['post_id'];
if (!$postId)
{
    writeRedirectSeeOther('/');
    exit();
}
$connection = connectDatabase();
$post = findPostInDatabase($connection, $postId);
if (!$post)
{
    writeRedirectSeeOther('/');
    exit();
}

require __DIR__ . '/../src/view/post.php';
