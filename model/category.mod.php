<?php
// фуи для работы с категориями
// список одобренных модератором категорий, в порядке убывания по количеству публикаций в данной категории
function getCategoriesList() : array {
    $sql = "SELECT * FROM `category` WHERE `stat` = '1' ORDER BY (SELECT COUNT(articles.cat_id) as 'Count'
        FROM articles WHERE  articles.cat_id = category.cat_id AND `moderation` = '1'
        GROUP BY cat_name) DESC";
        return getQuery($sql);
}
// получение конкретной категории по URL
function getOneCategory(array $params) : array {
    $sql = "SELECT * FROM category WHERE url = :url ";
    return getQuery($sql, $params, 'one');
}
// получение всех статей в данной категории
function getArticlesInCategory(array $params) : array {
    $sql = "SELECT articles.art_id, articles.title, articles.content, articles.author, category.cat_name, category.cat_id, category.url
    FROM articles, category
    WHERE articles.cat_id = category.cat_id AND category.url = :url AND `moderation` = '1'
    ORDER BY articles.date DESC";
    return getQuery($sql, $params);
}
// получение числа категорий
function getCategoriesQuantity() : int {
    $sql = "SELECT COUNT(cat_id) AS cat FROM category";
    $result = getQuery($sql,[] ,'one')['cat'];
    return $result;
}
// возвращает число существующих категорий, а так же имя текущей
function getCategoriesQuantName(array $params) : array {
    $sql = "SELECT
    (SELECT COUNT(cat_name) FROM category) AS quant,
    (SELECT cat_name FROM category WHERE cat_id = :id) AS name";
    return getQuery($sql, $params, 'one');
    // $result = getQuery($sql, $params ,'one');
    // return $result;
}
// добавить категорию
function addCategory(array $params = []) : bool {
    $sql = "INSERT INTO category (cat_name, url) VALUES (:cat_name, :url)";
    makeQueryToDB($sql, $params);
        return true;
}
// изменить категорию
function editCategory(array $params = []) : bool {
    $sql = "UPDATE category SET cat_name = :cat_name, url = :url WHERE cat_id = :cat_id";
    makeQueryToDB($sql, $params);
        return true;
}
// удалить существующую категорию
function removeCategory(array $params = []) : bool {
    $sql = "UPDATE category SET `stat`= '0' WHERE url = :url";
    makeQueryToDB($sql, $params);
        return true;
}
// получение числа статей в категории
function isCategoryEmpty (array $params = []) : string {
    $sql = "SELECT COUNT(articles.art_id) as quant
    FROM articles, category
    WHERE articles.cat_id = category.cat_id AND category.url = :url AND `moderation` = '1'
    ORDER BY articles.date DESC";
        return getQuery($sql, $params, 'one')['quant'];
}

// проверка существования категории вне зависимости от её статуса. Как по url, так и по cat_name
function checkCategory(array $params) : array {
    // $sql1 = "SELECT EXISTS(SELECT * FROM category WHERE url = :url or cat_name = :cat_name) as 'existst'";
    $sql = "SELECT * FROM category WHERE url = :url or cat_name = :cat_name";
    return getQuery($sql, $params, 'all');
    // $sql2
}

function checkCatRepeats(array $params) : array {
    $exist = [];
    // $sql1 = "SELECT EXISTS(SELECT * FROM category WHERE cat_name = :cat_name) as 'NAME'";
    // $sql2 = "SELECT EXISTS(SELECT * FROM category WHERE url = :url) as 'URL'";
    $sql = "SELECT (SELECT EXISTS(SELECT * FROM category WHERE cat_name = :cat_name)) as name,
            (SELECT EXISTS(SELECT * FROM category WHERE url = :url)) as url";
    $exist = getQuery($sql,$params, 'one');
    return $exist;
}


// проверка корректности данных для новой категории
function validationCatParams(array $catParams) : string {
    $errorArray = [];
    $errorMessage = '';

    $nameCorrectness = checkRUword($catParams['cat_name']);
    $urlCorrectness = checkURL($catParams['url']);

    $catParams['cat_name'] = makeFrstLttrUp(val($catParams['cat_name']));
    $catParams['url'] = strtolower(val($catParams['url']));
    $forbidden = checkForbiddenWords($catParams['url']);

    $repeatCheck = checkCatRepeats($catParams);
    // var_dump($repeatCheck);

    if ($nameCorrectness !== true) {
        $errorArray[] = 'Ошибка: название категории должно состоять только из кириллических символов';
    }
        if ($urlCorrectness !== true) {
            $errorArray[] = 'Ошибка: url должен состоять только из символов латинского алфавита';
        }
            if ($forbidden !== true) {
                $errorArray[] = 'Ошибка: в url используется недопустимое слово';
            }
                if ($repeatCheck['name'] === '1') {
                    $errorArray[] = 'Ошибка: используется уже существущие название для категории';
                }
                    if ($repeatCheck['url'] === '1') {
                        $errorArray[] = 'Ошибка: используется уже существущий URL для категории';
                    }

        if ($errorArray !== []) {
            foreach ($errorArray as $error) {
                $errorMessage .= $error;
                $errorMessage .= "<br>";
            }
        }
    return $errorMessage;
}





//             // первая проверка урла на корректность символов
//         if ($urlCorrectness === true) {
//             $urlCorrectness = checkForbiddenWords($catParams['url']);
//                 // проверка названия на корректность символов
//             if ($nameCorrectness === true) {
//                     // проверка урла на использование зарезервированных слов
//                 if ($urlCorrectness === true) {
//                     // проверка урла и названия на совпадение с уже существующими в БД
//                     if ([] === $repeatCheck) {
//                         addCategory($catParams);
//                         header('Location: /revision');
//                     }
//                     else {
//                         $errorMessage = 'Ошибка: используется уже существущий url или имя для категории';
//                         // exit('4 - используется уже существущий урл или имя категории');
//                     }
//                 }
//                 else {
//                     $errorMessage = 'Ошибка: в url используется недопустимое слово';
//                     // exit('3 - в УРЛ используется недопустимое слово');
//                 }
//             }
//             else {
//                 $errorMessage = 'Ошибка: название категории должно состоять только из кириллических символов';
//                 // exit('2 - первая проверка имени');
//             }
//         }
//         else {
//             $errorMessage = 'Ошибка: url должен состоять только из символов латинского алфавита';
//             // exit('1 - первая проверка урла');
//         }

// }
