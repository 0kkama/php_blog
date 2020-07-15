<?php
    // declare(strict_types=1);
    // include_once ('utility/config.util.php');
	// include_once('hub.php');

    makesVisitLog();
    $articles = getArticlesList();
    $categories = getCategoriesList();

include('view/index.view.php');
