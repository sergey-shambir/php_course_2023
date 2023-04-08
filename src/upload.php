<?php
declare(strict_types=1);

const UPLOADS_PATH = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'uploads';

const ALLOWED_MIME_TYPES_MAP = [
    'image/jpeg' => '.jpg',
    'image/png' => '.png',
    'image/webp' => '.webp',
];

function moveImageToUploads(array $fileInfo): string
{
    $fileName = $fileInfo['name'];
    $srcPath = $fileInfo['tmp_name'];
    $fileType = mime_content_type($srcPath);
    $imageExt = ALLOWED_MIME_TYPES_MAP[$fileType] ?? null;

    if (!$imageExt) {
        throw new InvalidArgumentException("File '$fileName' has non-image type '$fileType'");
    }

    $destFileName = uniqid('image', true) . $imageExt;

    return moveFileToUploads($fileInfo, $destFileName);
}

function moveFileToUploads(array $fileInfo, string $destFileName): string
{
    $uploadsPath = realpath(UPLOADS_PATH);
    if (!$uploadsPath || !is_dir($uploadsPath)) {
        throw new RuntimeException('Invalid uploads path: ' . UPLOADS_PATH);
    }

    $fileName = $fileInfo['name'];
    $destPath = $uploadsPath . DIRECTORY_SEPARATOR . $destFileName;
    $srcPath = $fileInfo['tmp_name'];
    if (!@move_uploaded_file($srcPath, $destPath)) {
        throw new RuntimeException("Failed to upload file $fileName");
    }

    return $destPath;
}