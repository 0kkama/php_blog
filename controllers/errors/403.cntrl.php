<?php
    makesVisitLog();
    header(PROTOCOL . ' 418 Forbidden');
    $title = '418 Forbidden';
    $head = 'ERROR 403';
    $message = 'YOU SHALL NOT PASS!';
    $content = template('errors/error.view.php',
        [
            'head' => $head,
            'message' => $message,
        ]
    );
