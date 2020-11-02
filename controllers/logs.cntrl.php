<?php
    // include_once ('utility/config.util.php');
    // include_once('hub.php');

if (isset($_GET['datelog'])) {
    $log = $_GET['datelog'];
    $content = showLogContent("logs/authorise/$log");
} else {
    $content = showLogsList();
}
   $_SERVER['REQUEST_METHOD'];


