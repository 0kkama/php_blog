<?php
    makesVisitLog();

    if(false === checkYourPrivileges($user, ADMIN_LVL)) {
        header('Location: ' . ROOT_URL);
        exit();
    }

    $errMsg = '';
// добавить проверку при попытке редактировать несуществующую категорию

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // выводим данные в формах
        $changeCategory = getOneCategory(URL_PARAMS);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $changeCategory = extractFields(['cat_name', 'url'], $_POST);
        $catData = getOneCategory(URL_PARAMS);
        $changeCategory['cat_id'] = $catData['cat_id'];
        $errMsg = validationCatParams($changeCategory);

        if ($errMsg === '') {
            // $changeCategory['url'] = strtolower(val($changeCategory['url']));
            // $сategory['cat_name'] = makeFrstLttrUp(val($changeCategory['cat_name']));

            // происходящее ниже является непонятным шаманством, но верхние две строчки не работают,
            // при том, что аналогичные строчки корректно работают в контроллере revision.cntrl.php
            // а так работает:
            $catName = $changeCategory['cat_name'];
            $catURL = $changeCategory['url'];
            $catName = makeFrstLttrUp(val($catName));
            $catURL = strtolower(val($catURL));

                $changeCategory['cat_name'] = $catName;
                $changeCategory['url'] = $catURL;

            editCategory($changeCategory);
            header('Location: ' . ROOT_URL . 'categories/revision');
            exit();
        }
    }

    $title = 'Изменить: ' . $changeCategory['cat_name'];
    $content = template('categories/edit.view.php' ,
        [
            'category' => $changeCategory,
            'errMsg' => $errMsg,
        ]);

// echo $_SERVER['REQUEST_METHOD'];
