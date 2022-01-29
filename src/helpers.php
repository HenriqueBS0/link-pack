<?php

function session(string $identifier, string|array|int|bool|null $date = null)
{
    session_start();

    if (is_null($date)) {
        return isset($_SESSION[$identifier])
            ? $_SESSION[$identifier]
            : null;
    }

    $_SESSION[$identifier] = $date;
}

function view(string $path): void
{
    require_once("Views/{$path}.php");
}


function redirect(string $path): void
{
    header("Location: http://localhost:8080/{$path}");
    exit;
}

function publicPath(string $path): string
{
    return "http://localhost:8080/public/{$path}";
}

function links(array|null $links = null)
{
    $filePath = './src/links.json';

    if(is_null($links)) {
        return json_decode(file_get_contents($filePath));
    }

    $file = fopen($filePath, 'w');

    fwrite($file, json_encode($links));

    fclose($file);
}