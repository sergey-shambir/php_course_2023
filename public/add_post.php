<?php
declare(strict_types=1);

require_once __DIR__ . '/../src/Controller/PostController.php';

$controller = new PostController();
$controller->publishPost($_POST);
