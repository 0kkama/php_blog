<?php
    declare(strict_types=1);

    $user['status'] = $user['status'] ?? null;

    if($user['status'] !== 'admin') {
        header('Location: ' . ROOT_URL);
        exit();
    }

    $title = 'phpInfo';
    ob_start();
    phpinfo();
    echo ' <style type="text/css"> body {background-color: #8892BF; } </style> ' ;
    $content = ob_get_clean();

// file_put_contents('/logs/info.txt', $content, FILE_APPEND);
// var_dump($content);


