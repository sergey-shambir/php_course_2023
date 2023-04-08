<?php
declare(strict_types=1);

const UPLOAD_DIR = __DIR__ . '..' . DIRECTORY_SEPARATOR . 'uploads';

const ALLOWED_IMAGE_TYPES = ['image/jpeg', 'image/png', 'image/webp'];

function moveImageToUploads(array $fileInfo): string
{
    $type = $fileInfo['type'];
    if (!in_array($type, ALLOWED_IMAGE_TYPES, true))
    {
        throw new RuntimeException("Invalid image type: $type");
    }
    return moveFileToUploads($fileInfo);
}

function moveFileToUploads(array $fileInfo): string
{
    $filename = $fileInfo['name'];
    $srcPath = $fileInfo['tmp_name'];
    $destPath = UPLOAD_DIR . DIRECTORY_SEPARATOR . $filename;
    if (@move_uploaded_file($srcPath, $destPath))
    {
        throw new RuntimeException("Failed to move uploaded file $filename");
    }

    return $destPath;
}
