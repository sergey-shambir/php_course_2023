<?php
declare(strict_types=1);

require_once __DIR__ . '/../Database/ConnectionProvider.php';
require_once __DIR__ . '/../Database/PostTable.php';
require_once __DIR__ . '/../Model/Post.php';

class PostController
{
    private const HTTP_STATUS_303_SEE_OTHER = 303;

    private PostTable $postTable;

    public function __construct()
    {
        $connection = ConnectionProvider::connectDatabase();
        $this->postTable = new PostTable($connection);
    }

    public function index(): void
    {
        require __DIR__ . '/../View/add_post_form.php';
    }

    public function publishPost(array $requestData): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST')
        {
            $this->writeRedirectSeeOther('/');
            return;
        }

        $post = new Post(
            null,
            $requestData['title'],
            $requestData['subtitle'],
            $requestData['content'],
        );
        $postId = $this->postTable->add($post);
        $this->writeRedirectSeeOther("/show_post.php?post_id=$postId");
    }

    public function showPost(array $queryParams): void
    {
        $postId = (int)$queryParams['post_id'];
        if (!$postId)
        {
            $this->writeRedirectSeeOther('/');
            exit();
        }
        $post = $this->postTable->find($postId);
        if (!$post)
        {
            $this->writeRedirectSeeOther('/');
            exit();
        }

        require __DIR__ . '/../View/post.php';
    }

    private function writeRedirectSeeOther(string $url): void
    {
        header('Location: ' . $url, true, self::HTTP_STATUS_303_SEE_OTHER);
    }
}
