<?php

    $title = 'Логи';
    $logsList = 'sdfsdfs';
    echo $logsList;

    $content = template('logs.views.php',
        ['logsList' => $logsList]
    );

if (isset($_GET['datelog'])) {
    $log = $_GET['datelog'];
    $content = showLogContent("logs/authorise/$log");
} else {
    $content = showLogsList();
}
   $_SERVER['REQUEST_METHOD'];


