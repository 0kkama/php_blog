<?php
    makesVisitLog();
    header(PROTOCOL . ' 423 Locked');
    $title = '418 Locked';
    $head = 'ERROR 423';
    $message = 'This resource is locked!';
    $content = template('errors/error.view.php',
        [
            'head' => $head,
            'message' => $message,
        ]
    );
