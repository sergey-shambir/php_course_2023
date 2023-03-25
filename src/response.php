<?php
declare(strict_types=1);

const HTTP_STATUS_303_SEE_OTHER = 303;

function writeRedirectSeeOther(string $url): void
{
    header('Location: ' . $url, true, HTTP_STATUS_303_SEE_OTHER);
}
