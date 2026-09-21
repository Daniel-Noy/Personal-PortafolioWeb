<?php
declare(strict_types=1);

function debugguing(mixed $var) : string
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    exit;
}

function s($html) : string
{
    $s = htmlspecialchars($html);
    return $s;
}

function currentPage(string $path) : bool
{
    return str_contains($_SERVER['PATH_INFO'] ?? '/', $path);
}

function deleteImage(string $name, string $ext = '.webp') : bool {
    $imagesDir = '../public/img/';
    return unlink($imagesDir.$name.$ext);
}

//? Auth -----------
function isAuth() : void
{
    if (!isAdmin()) {
        header('Location: /login');
        return;
    }
}

function isUser() : bool
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    return isset($_SESSION['name']);
}

function isAdmin() : bool
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    return isset($_SESSION['isAdmin']) && boolval($_SESSION['isAdmin']);
}

function startSession() : void
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}


