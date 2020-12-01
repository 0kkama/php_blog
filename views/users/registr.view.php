<form method="post">
    <?php if((bool) $registrErr ?? false): ?>
        <hr>
        <div class="alert alert-danger">
            <?= $registrErr ?>
        </div>
    <?php endif; ?>
    <div class="form-group">
        <label for="auth-name">Name</label>
        <input type="text" class="form-control" id="auth-login" name="name" value="<?=$registrData['name'] ?? ''?>">
    </div>
    <div class="form-group">
        <label for="auth-surname">Surname</label>
        <input type="text" class="form-control" id="auth-login" name="surname" value="<?=$registrData['surname'] ?? ''?>">
    </div>
    <div class="form-group">
        <label for="auth-login">Login</label>
        <input type="text" class="form-control" id="auth-login" name="login" value="<?=$registrData['login'] ?? ''?>">
    </div>
    <div class="form-group">
        <label for="auth-password">Password</label>
        <input type="password" class="form-control" id="auth-password" name="password1" value="<?=$registrData['password1'] ?? ''?>">
    </div>
    <div class="form-group">
        <label for="auth-password">Repeat password</label>
        <input type="password" class="form-control" id="auth-password" name="password2" value="<?=$registrData['password2'] ?? ''?>">
    </div>
    <div class="form-group">
        <label for="auth-email">Email</label>
        <input type="text" class="form-control" id="auth-email" name="email" value="<?=$registrData['email'] ?? ''?>">
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="login-remember" name="remember">
        <label class="form-check-label" for="login-remember">
            Remember me for one month
        </label>
    </div>
    <hr>
    <button class="btn btn-primary">Log In</button>
</form>
