<?php
    makesVisitLog();

    if(!empty($user)) {
        header('Location: ' . ROOT_URL);
        exit();
    }

    $registrErr = '';
    $registrData = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $registrData = extractFields(['name', 'surname', 'login', 'password1', 'password2', 'email'] , $_POST);
        $remember = isset($_POST['remember']);
        // валидация полей
        $registrErr = validUserRegistry($registrData);

        // захэшировать пароль и отправить данные в БД
        if ('' === $registrErr) {
            $userData =  $registrData;
            $userData['pass'] = password_hash($userData['password1'], PASSWORD_BCRYPT);
            $userData['name'] = makeFrstLttrUp(val($userData['name'], 1));
            $userData['surname'] = makeFrstLttrUp(val($userData['surname'], 1));
            $userData['login'] = val($userData['surname'], 1);

            unset($userData['password1']);
            unset($userData['password2']);
            // добавление нового пользователя
            if( addNewUser($userData)) {
                // создаем сессию пользователя
                $user = getUserDataByLogin($userData['login']);
                $token = getToken();
                addNewSession($user['user_id'], $token);
                $_SESSION['token'] = $token;
                // если пользоваетель поставил чекбокс, то создаём соответствующую куку, хранящую токен
                if($remember) {
                    setcookie('token', $token, getDaysQuant(30), ROOT_URL);
                }
                header('Location: ' . ROOT_URL);
                exit();
            }
        }
    }

    $title = 'Registration';
    $content = template('users/registr.view.php',
        [
            'registrErr' => $registrErr,
            'registrData' => $registrData,
        ]
    );
