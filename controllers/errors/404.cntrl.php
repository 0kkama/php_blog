<?php
    makesVisitLog();
    header(PROTOCOL . ' 404 Not Found');
    $title = '404 Not Found';
    $head = 'ERROR 404';
    $message = 'Page not found!';
    $content = template('errors/error.view.php',
        [
            'head' => $head,
            'message' => $message,
        ]
    );
