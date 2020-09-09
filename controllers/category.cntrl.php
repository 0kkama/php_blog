 <?php
    makesVisitLog();
// проверка верности передаваемого ID
    if (!checkID($_GET['id'])) {
        ifErr404();
    }

    $category['id'] = (int) val(($_GET['id']));
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
    }

// если все в порядке
        else {
            $title = $articles[0]['cat_name'];
            $content = template('category.view.php', ['articles' => $articles]);
        }
