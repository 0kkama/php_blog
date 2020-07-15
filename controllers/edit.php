<?php
    // include_once ('utility/config.util.php');
    // include_once('hub.php');

    makesVisitLog();
    $editStatus = false;
    $categories = getCategoriesList();

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $params['art_id'] = (int) val( $_GET['id'] ?? 0 );
        $article = getOneArticle($params);
// var_dump_pre($_GET); var_dump_pre($params ?? []); echo '------------- 12';
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $params = $params = extractFields(['title', 'content', 'cat_id'], $_POST);
            $params['art_id'] = (int) val( $_POST['id']);
            $errMsg = checkParams($params);
// var_dump_pre($_POST); var_dump_pre($params ?? []); echo '------------ 13';
        if (!$errMsg) {
            $editStatus = editArticle($params);
            }
   } else {
        echo 'What\'s wrong with you?';
        exit();
   }
// echo 'POST'; var_dump_pre($_POST); echo 'params'; var_dump_pre($params ?? []); echo 'article'; var_dump_pre($article ?? []);
include('view/edit.view.php');

