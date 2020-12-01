<?php
// фуи для работы с пользователями(авторами)
// cписок авторов
function getAuthorsList() : array {
    $sql = "SELECT * FROM users";
        return getQuery($sql);
    }
// получение логина автора по его ID
function getUserLogin($user_id) : string {
    $sql = "SELECT login FROM users WHERE user_id = :user_id";
    $params['user_id'] = $user_id;
    return getQuery($sql, $params, 'one')['login'];
}
// генерирует токен длинной 128 символов
function getToken() {
    return substr(bin2hex(random_bytes(128)), 0, 128);
}
// получение данных пользователя по логину
function getUserDataByLogin(string $login) : array {
    $params['login'] = $login;
    $sql = "SELECT user_id, pass FROM users WHERE login = :login";
    return getQuery($sql, $params, 'one');
}
// добавление новой сесси в БД
function addNewSession(string $user_id, string $token) : bool {
    $params = ['user_id' => $user_id, 'token' => $token];
    $sql = "INSERT INTO sessions (user_id, token) VALUES (:user_id, :token)";
    makeQueryToDB($sql, $params);
    return true;
}
// получение данных из БД сесси по токену
function getSessionByToken(string $token) : array {
    $params['token'] = $token;
    $sql = "SELECT * FROM sessions WHERE token = :token";
    return getQuery($sql, $params, 'one');
}
// получение данных пользователя по ИД
function getUserByID(string $userID) : array {
    $params['user_id'] = $userID;
    $sql = "SELECT user_id, login, email, name, surname, status FROM users WHERE user_id = :user_id";
    return getQuery($sql, $params, 'one');
}
// добавление нового пользователя в БД
function addNewUser (array $userData) : bool {
    $sql = "INSERT INTO users (name, surname, login, pass, email) VALUES (:name, :surname, :login, :pass, :email)";
    makeQueryToDB($sql, $userData);
    return true;
}
// проверка уникальности логина и мэйла
function checkLoginAndMail(string $login, string $email) : array {
    $params = ['login' => $login, 'email' => $email];
    $sql = "SELECT (SELECT EXISTS(SELECT user_id FROM users WHERE login = :login)) as 'login',
    (SELECT EXISTS(SELECT user_id FROM users WHERE email = :email)) as 'email'";
    return getQuery($sql, $params, 'one');
}
// проверка данных для регистрации пользователя
function validUserRegistr(array $userData) : string {
    $errorArray = [];
    $errorMessage = '';
    $canWeMakeQuery = true;
    // проверка заполненности всех полей
    if (checkEmptyForms($userData)) {
        $errorMessage =  'Ошибка: не все поля формы заполнены!';
        // $canWeMakeQuery = false;
        return $errorMessage;
    }
        // проверка совпадения паролей
            if ($userData['password1'] !== $userData['password2']) {
                $errorArray[] = 'Ошибка: пароли не совпадают!';
                $canWeMakeQuery = false;
            }
            // проверка валидности имени и фамилии
            if (true !== checkRUword($userData['name']) or true !== checkRUword($userData['surname'])) {
                $errorArray[] = 'Ошибка: имя и фамилия должны содержать только кириллические символы!';
                $canWeMakeQuery = false;
            }
            // проверка логина по списку и паттерну
            if (true !== checkForbiddenWords($userData['login']) or true !== checkLogin($userData['login'])) {
                $errorArray[] = 'Ошибка: недопустимый логин! Используйте только латинские символы и цифры';
                $canWeMakeQuery = false;
            }
            // проверка мэйла по паттерну
            if (true !== checkEmail($userData['email'])) {
                $errorArray[] = 'Ошибка: недопустимый email!';
                $canWeMakeQuery = false;
            }
            // если предыдущие проверки пройдены, то делаем запрос к БД на уникальность логина и мэйла
            if($canWeMakeQuery) {
                $loginAndMail = checkLoginAndMail($userData['login'], $userData['email']);
                if ($loginAndMail['login']) {
                    $errorArray[] = 'Ошибка: такой логин уже существует!';
                }
                if ($loginAndMail['email']) {
                    $errorArray[] = 'Ошибка: такой email уже используется!';
                }
            }

        if ($errorArray !== []) {
            foreach ($errorArray as $error) {
                $errorMessage .= $error;
                $errorMessage .= "<br>";
            }
        }
    return $errorMessage;
}


















