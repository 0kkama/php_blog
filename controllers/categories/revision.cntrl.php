<?php
// контроллер для добавления, удаления и редактирования категорий
    // возможно, стоит сделать автоматическое преобразование ИМЕНИ в УРЛ
    makesVisitLog();
    // если юзер не админ, то доступ запрещён
    if(false === checkYourPrivilegie($user, ADMIN_LVL)) {
        ifErr403();
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
