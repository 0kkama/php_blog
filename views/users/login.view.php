
<form method="post">
    <div class="form-group">
        <label for="auth-login">Login</label>
        <input type="text" class="form-control" id="auth-login" name="login">
    </div>
    <div class="form-group">
        <label for="auth-password">Password</label>
        <input type="password" class="form-control" id="auth-password" name="password">
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="login-remember" name="remember">
        <label class="form-check-label" for="login-remember">
            Remember me for one month
        </label>
    </div>
    <hr>
    <button class="btn btn-primary">Log In</button>
    <?php if($loginErr): ?>
        <hr>
        <div class="alert alert-danger">
            Incorrect login or password
        </div>
    <?php endif; ?>
    <?php if($alertMessage): ?>
        <hr>
        <div class="alert alert-danger">
            You must be logged in for this type of action
        </div>
    <?php endif; ?>
</form>
