<?php
declare(strict_types=1);


// Создаёт объект PDO, представляющий подключение к MySQL.
function connectDatabase(): PDO
{
    $dsn = 'mysql:host=127.0.0.1;dbname=php_course';
    $user = 'php-course-app';
    $password = 'gX5t2UUbBn';
    return new PDO($dsn, $user, $password);
}

// Сохраняет пост в таблицу post, возвращает ID поста.
function savePostToDatabase(PDO $connection, array $postParams): int
{
    $query = <<<SQL
        INSERT INTO post (title, subtitle, illustration_path, content)
        VALUES (:title, :subtitle, :illustration, :content)
        SQL;

    $statement = $connection->prepare($query);
    $statement->execute([
        ':title' => $postParams['title'],
        ':subtitle' => $postParams['subtitle'],
        ':illustration' => $postParams['illustration'],
        ':content' => $postParams['content']
    ]);

    return (int)$connection->lastInsertId();
}

// Извлекает из БД данные поста с указанным ID.
// Возвращает null, если пост не найден
function findPostInDatabase(PDO $connection, int $id): ?array
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
    $row = $statement->fetch(PDO::FETCH_ASSOC);

    return $row ?: null;
}
