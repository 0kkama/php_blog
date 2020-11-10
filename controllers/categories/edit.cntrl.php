<?php

    makesVisitLog();
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

            // происходящее ниже является непонятным шаманством, но верхние две строчки не работают, а так работает
            $catName = $changeCategory['cat_name'];
            $catURL = $changeCategory['url'];
            $catName = makeFrstLttrUp(val($catName));
            $catURL = strtolower(val($catURL));

                $changeCategory['cat_name'] = $catName;
                $changeCategory['url'] = $catURL;

            editCategory($changeCategory);
            header('Location: /revision');
        }
    }

    $title = 'Изменить: ' . $changeCategory['cat_name'];
    $content = template('categories/edit.view.php' , [
            'title' => $title,
            'contetn' => $content,
            'category' => $changeCategory,
            'errMsg' => $errMsg,
        ]);

// echo $_SERVER['REQUEST_METHOD'];
