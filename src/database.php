<?php
declare(strict_types=1);

require_once __DIR__ . '/Model/Post.php';

// Создаёт объект PDO, представляющий подключение к MySQL.
function connectDatabase(): PDO
{
    $dsn = 'mysql:host=127.0.0.1;dbname=php_course';
    $user = 'php-course-app';
    $password = 'gX5t2UUbBn';
    return new PDO($dsn, $user, $password);
}

// Сохраняет пост в таблицу post, возвращает ID поста.
function savePostToDatabase(PDO $connection, Post $post): int
{
    $query = <<<SQL
        INSERT INTO post (title, subtitle, content)
        VALUES (:title, :subtitle, :content)
        SQL;

    $statement = $connection->prepare($query);
    $statement->execute([
        ':title' => $post->getTitle(),
        ':subtitle' => $post->getSubtitle(),
        ':content' => $post->getContent()
    ]);

    return (int)$connection->lastInsertId();
}

// Извлекает из БД данные поста с указанным ID.
// Возвращает null, если пост не найден
function findPostInDatabase(PDO $connection, int $id): ?Post
{
    $query = <<<SQL
        SELECT
            id,
            title,
            subtitle,
            content,
            posted_at
        FROM post
        WHERE id = $id
        SQL;

    $statement = $connection->query($query);
    if ($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
        return new Post((int)$row['id'], $row['title'], $row['subtitle'], $row['content']);
    }

    return null;
}
