<?php
    makesVisitLog();
    header(PROTOCOL . ' 418 I\'m a teapot');
    $title = '418 I\'m a teapot';
    $head = 'ERROR 418';
    $message = 'I\'m a teapot';
    $content = template('errors/error.view.php',
        [
            'head' => $head,
            'message' => $message,
        ]
    );
