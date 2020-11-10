<?php
            // возможно, стоит сделать автоматическое преобразование ИМЕНИ в УРЛ

    makesVisitLog();
    $errMsg = '';

    $categories = getCategoriesList();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $newCategory = extractFields(['cat_name', 'url'], $_POST);
        $errMsg = validationCatParams($newCategory);

        if ($errMsg === '') {
            $newCategory['cat_name'] = makeFrstLttrUp(val($newCategory['cat_name']));
            $newCategory['url'] = strtolower(val($newCategory['url']));
            addCategory($newCategory);
            header('Location: /revision');
        }
    }

    $title = 'Редактирование категорий';
    $content = template('categories/revision.view.php', [
        'categories' => $categories,
        'newCategory' => $newCategory ?? '',
        'errMsg' => $errMsg,
    ]);
