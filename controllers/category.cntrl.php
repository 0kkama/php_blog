 <?php
    makesVisitLog();
    var_dump($urichunks);
// проверка верности передаваемого ID
    if (!checkID(URL_PARAMS[2])) {
        ifErr404();
    }

    $category['id'] = (int) val(URL_PARAMS[2]);
    $isExist = getOneCategory($category);
// проверка существования указанной категории
    if (!$isExist) {
        ifErr404();
    }

    $articles = getArticlesInCategory($category);
// если в категории нет статей
    if (!$articles) {
            $title = $isExist[0]['cat_name'];
            $content = "Категория пуста";
            // и если всё в порядке
    }   else {
            $title = $articles[0]['cat_name'];
            $content = template('category.view.php', ['articles' => $articles]);
        }
