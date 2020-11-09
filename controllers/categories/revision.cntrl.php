<?php
// ПОМИНТЬ про роутеры!!

    // получить список существующих категорий
    // передать их шаблонизатору
    // отрисовать шаблон

    // в шаблоне можно   (+ новая категория не может иметь урл равный словам add/edit/delete/category/revision )
        // добавить. (можно только если категория не существует)
        // удалить. (можно только если категория пуста (вопрос действительно пуста, или все статьи помечены как невидимые?))
        // изменить. (так же проверять на совпадение и корректность)
        // УРЛ и ИМЯ не должны содержать запрещённых символов, т.ч. нужна проверка регуляркой
        // возможно, стоит сделать автоматическое преобразование ИМЕНИ в УРЛ
        // нужны соответствующие функции в модели

    // действия с категориями передают урпавление соответствующему контроллеру
    // который, однако не отрисовывает нового шаблона, а лишь выполняет действие и совершает редирект обратно
    // исключение, возможно, для функции редактирования категории

    // сделать функцию для обработки имени категории: первая буква заглавная, остальные строчные


    // Возможно стоить сделать отдельную функцию для проверки данных форм, при добавлении новой категории,
    // тем самым облегчив контроллер

    makesVisitLog();
    $editStatus = false;
    $errMsg = '';

    $categories = getCategoriesList();

    if ($_SERVER['REQUEST_METHOD'] === 'POST'):
        $newCategory = extractFields(['cat_name', 'url'], $_POST);
        // $nameCorrectness = checkRUword($newCategory['cat_name']);
        // $urlCorrectness = checkURL($newCategory['url']);

        $errMsg = validationNewCategory($newCategory);

        if ($errMsg === '') {
            $newCategory['cat_name'] = makeFrstLttrUp(val($newCategory['cat_name']));
            $newCategory['url'] = strtolower(val($newCategory['url']));
            addCategory($newCategory);
            header('Location: /revision');

        }


    endif;

    $title = 'Редактирование категорий';
    $content = template('categories/revision.view.php', [
        'categories' => $categories,
        'newCategory' => $newCategory ?? '',
        'errMsg' => $errMsg,
    ]);














           // первая проверка урла на корректность символов
        // if ($urlCorrectness === true) {
        //     $newCategory['url'] = strtolower(val($newCategory['url']));
        //     $urlCorrectness = checkForbiddenWords($newCategory['url']);
        //         // проверка названия на корректность символов
        //     if ($nameCorrectness === true) {
        //         $newCategory['cat_name'] = makeFrstLttrUp(val($newCategory['cat_name']));
        //             // проверка урла на использование зарезервированных слов
        //         if ($urlCorrectness === true) {
        //             $repeatCheck = checkCategory($newCategory);
        //             // проверка урла и названия на совпадение с уже существующими в БД
        //             if ([] === $repeatCheck) {
        //                addCategory($newCategory);
        //                header('Location: /revision');
        //             }
        //             else {
        //                 $errMsg = 'Ошибка: используется уже существущий url или имя для категории';
        //                 // exit('4 - используется уже существущий урл или имя категории');
        //             }
        //         }
        //         else {
        //             $errMsg = 'Ошибка: в url используется недопустимое слово';
        //             // exit('3 - в УРЛ используется недопустимое слово');
        //         }
        //     }
        //     else {
        //         $errMsg = 'Ошибка: название категории должно состоять только из кириллических символов';
        //         // exit('2 - первая проверка имени');
        //     }
        // }
        // else {
        //     $errMsg = 'Ошибка: url должен состоять только из символов латинского алфавита';
        //     // exit('1 - первая проверка урла');
        // }


  /*  if ($_SERVER['REQUEST_METHOD'] === 'POST'):

        $newCategory = extractFields(['cat_name', 'url'], $_POST);
        // проверить корректность урла и имени по используемым символам
        $nameCorrectness = checkRUword($newCategory['cat_name']);
        $urlCorrectness = checkURL($newCategory['url']);
        // echo $nameCorrectness . ' | ' . $urlCorrectness;
            // если урл проходит первую проверку
        if ($urlCorrectness) {
            // проверка на использование зарезервированных слов
            $newCategory['url'] = strtolower(val($newCategory['url']));
            $urlCorrectness = checkForbiddenWords($newCategory['url']);
        }
        else {
            $errMsg = 'Урл не прошёл первую проверку';
            // exit('Урл не прошёл первую проверку');
        }

        if ($nameCorrectness) {
            $newCategory['cat_name'] = makeFrstLttrUp(val($newCategory['cat_name']));
        }
        else {
            exit('Имя не прошло первую проверку');
        }

        if ($urlCorrectness) {
            // проверка на совпадение имени и урла категории с уже существующими
            $repeatCheck = checkCategory($newCategory);
            // var_dump_pre($repeatCheck);
            if ([] === $repeatCheck) {
                echo ('все проверки пройдёны');
                // addCategory($newCategory);
                // header('Location: /revision');
            }
            else {

                var_dump_pre($repeatCheck);
                exit('Используется уже существущий урл или имя категории');
            }
        }
        else {
            // echo 'We got a problem!';
            exit('Используется запрещённое слово для УРЛа');
        }
    endif;
    // echo $_SERVER['HTTP_REFERER'];
*/
