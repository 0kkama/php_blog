<?php
// функция получения данных пользователя по токену из сессии или из куки
function getUserAuthByToken() : array {
    $user = [];
    // токен берётся из сессии или из куки, в противном случае он нулл
    $token = $_SESSION['token'] ?? $_COOKIE['token'] ?? [];
    // если токен получен, то берём данные сессии из БД
    if($token !== []) {
        $session = getSessionByToken($token);
        // если подобная сессия существует, то берём данные о юзере по ИД
        if($session !== []) {
            $user = getUserByID($session['user_id']);
        }
        // если такого юзера не существует (или забанен), то уничтожаем данные сессии и куки
        if($user === []) {
            unset($_SESSION['token']);
            setcookie('token', '', time() - 86400, ROOT_URL);
        }
    }
    return $user;
}
// функция проверки прав доступа к различным действиям на сайте
// если пользователь не авторизован или права доступ меньше требуемого уровня, то вернёт false
function checkYourPrivileges (array $user = [], int $level) : bool {
    return !(empty($user) or $user['level'] < $level);
}

