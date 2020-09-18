<?php
    // include_once ('utility/config.util.php');
    // include_once('hub.php');

if (isset($_GET['datelog'])) {
    $log = $_GET['datelog'];
    print showLogContent("logs/authorise/$log");
} else {
    print showLogsList();
}
   $_SERVER['REQUEST_METHOD'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>logs</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="/css/styles.css" />
</head>
