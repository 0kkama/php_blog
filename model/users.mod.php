<?php
// фуи для работы с пользователями(авторами)

// генерирует авторизационный токен длинной 128 символов
function getToken() {
    return substr(bin2hex(random_bytes(128)), 0, 128);
}
// получение данных о всех пользователях
function getUsersList() : array {
    $sql = "SELECT user_id, name, surname, login, `date`, email, level, status FROM users ORDER BY `date`";
    return getQuery($sql);
}
// даёт пользователю права и стутус юзера
function regainUser (string $userID) : bool {
    $params = ['user_id' => $userID, 'level' => USER_LVL, 'status' => 'user'];
    $sql = "UPDATE users SET level = :level, status = :status WHERE user_id = :user_id AND user_id > 2";
    makeQueryToDB($sql, $params);
    return true;
}
// даёт пользователю права и статус модератора
function makeModer (string $userID) : bool {
    $params = ['user_id' => $userID, 'level' => MODER_LVL, 'status' => 'moder'];
    $sql = "UPDATE users SET level = :level, status = :status WHERE user_id = :user_id AND user_id > 2";
    makeQueryToDB($sql, $params);
    return true;
}
// получение данных пользователя по логину
function getUserDataByLogin(string $login) : array {
    $params['login'] = $login;
    $sql = "SELECT user_id, pass, status FROM users WHERE login = :login";
    return getQuery($sql, $params, 'one');
}
// добавление новой сесси в БД
function addNewSession (string $userID, string $token) : bool {
    $params = ['user_id' => $userID, 'token' => $token];
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
    $sql = "SELECT user_id, login, email, name, surname, level, status FROM users WHERE user_id = :user_id";
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
function validUserRegistry(array $userData) : string {
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

// получение логина автора по его ID
function getUserLogin(string $userID) : string {
    $params['user_id'] = $userID;
    $sql = "SELECT login FROM users WHERE user_id = :user_id";
    return getQuery($sql, $params, 'one')['login'];
}














// понижает права доступа пользователя до 0 и статуса забаненного, удаляет все его данные сессии из БД
function expelUser (string $userID) : bool {
    $params = ['user_id' => $userID, 'level' => LOCK_LVL, 'status' => 'ban'];
    $params2 = ['user_id' => $userID];
    $sql = "UPDATE users SET level = :level, status = :status WHERE user_id = :user_id AND user_id > 2";
    $sql2 = "DELETE FROM sessions WHERE user_id = :user_id AND user_id > 2";
    makeQueryToDB($sql, $params);
    makeQueryToDB($sql2, $params2);
    return true;
}



