<?php
    // контроллер входа пользователя на сайт
    makesVisitLog();

    if(!empty($user)) {
        header('Location: ' . ROOT_URL);
        exit();
    }

    $alertMessage = false;

    if(isset($_SESSION['attentio'])){
        $alertMessage = true;
        unset($_SESSION['attentio']);
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $authData = extractFields(['login', 'password'], $_POST);
        $remember = isset($_POST['remember']);
        if ('' !== $authData['login']  && '' !== $authData['password'] ) {
            // получаем данные из БД по введённому логину
            $userData = getUserDataByLogin($authData['login']);
            // если такой юзер есть в БД и введённый пароль соответствует хэшу из БД и юзер не забанен
            if(([] !== $userData  && password_verify($authData['password'], $userData['pass'])) and $userData['status'] !== 'ban') {
                // то генерируем токен на основе которого создаём новую сессию в БД, а так же кладём этот токен в сессию текущего сеанса
                $token = getToken();
                addNewSession($userData['user_id'], $token);
                $_SESSION['token'] = $token;
                // если пользователь поставил чекбокс, то создаём соответствующую куку, хранящую токен
                if($remember) {
                    setcookie('token', $token, getDaysQuant(30), ROOT_URL);
                }
                header('Location: ' . ROOT_URL);
                exit();
            }
            else {
                $loginErr = true;
                // unset($userData);
            }
        }
        else {
            $loginErr = true;
        }
    }
    else {
        $loginErr = false;
    }

    // var_dump($userData);
    // var_dump($user);
    $title = 'Login';
    $content = template('users/login.view.php',
        [
            'loginErr' => $loginErr,
            'alertMessage' => $alertMessage,
        ]
    );




