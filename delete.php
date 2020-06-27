<?php
    declare(strict_types=1);
    include_once ('controller/config.php');
    include_once('library.php');
	include_once ('styles.php');

    $artId = (int) (val((   $_GET['id'] ?? 0   )));
    $artArray = getArticles();

if ( isset($artArray[$artId])) {
    //foreach ($artArray as $arr) {
    //    if ($arr['id'] === $artId) {
        removeArticle($artId);
        echo 'Article deleted!';
    } else {
        echo 'This article doesn\'t exist!';
    }
?>
<hr>
<a href="index.php"> Move to main page </a>
