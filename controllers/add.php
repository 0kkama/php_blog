<?php
    // include_once ('utility/config.util.php');
    // include_once('hub.php');

    makesVisitLog();
	$sendStatus = false;
    $categories = getCategoriesList();
    $authors = getAuthorsList();

    if ($_SERVER['REQUEST_METHOD'] === 'POST'):
        $params = extractFields(['user_id','cat_id','title','content'], $_POST);
        $params['author'] = getUserLogin($_POST['user_id']);
        $errMsg = checkParams($params);
        if (!$errMsg) {
           $sendStatus = addArticle($params);
        }
    endif;
    // echo 'POST:'; var_dump_pre($_POST); echo 'params:'; var_dump_pre($params ?? []);
    include('view/add.view.php');

