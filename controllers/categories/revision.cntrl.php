<?php

// контроллер для добавления, удаления и редактирования категорий
            // возможно, стоит сделать автоматическое преобразование ИМЕНИ в УРЛ

    makesVisitLog();
    // var_dump($user);
    // $user = null;
    if(empty($user) || $user['status'] !== 'admin') {
        ifErr403();
        // header('Location: ' . ROOT_URL);
        // exit();
    }
    else {

        $errMsg = '';
        $categories = getCategoriesList();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newCategory = extractFields(['cat_name', 'url'], $_POST);
            $errMsg = validationCatParams($newCategory);

            if ($errMsg === '') {
                $newCategory['cat_name'] = makeFrstLttrUp(val($newCategory['cat_name']));
                $newCategory['url'] = strtolower(val($newCategory['url']));
                addCategory($newCategory);
                header('Location: ' . ROOT_URL . 'categories/revision');
            }
        }

        $title = 'Редактирование категорий';
        $content = template('categories/revision.view.php', [
            'categories' => $categories,
            'newCategory' => $newCategory ?? '',
            'errMsg' => $errMsg,
        ]);
    }
