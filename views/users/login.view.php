
<form method="post">
    <div class="form-group">
        <label for="auth-login">Логин</label>
        <input type="text" class="form-control" id="auth-login" name="login">
    </div>
    <div class="form-group">
        <label for="auth-password">Пароль</label>
        <input type="password" class="form-control" id="auth-password" name="password">
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="login-remember" name="remember">
        <label class="form-check-label" for="login-remember">
            Запомнить меня на один месяц
        </label>
    </div>
    <hr>
    <button class="btn btn-primary">Войти</button>
    <?php if($loginErr): ?>
        <hr>
        <div class="alert alert-danger">
            Некорректный логин или пароль
        </div>
    <?php endif; ?>
    <?php if($alertMessage): ?>
        <hr>
        <div class="alert alert-danger">
            Вы должны войти в системе для подобных действий
        </div>
    <?php endif; ?>
</form>
