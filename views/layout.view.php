<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?></title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css" />
</head>

<body>
    <div class="root">
        <header id='header'>
        <?php if (checkYourPrivilegie($user, ADMIN_LVL)): ?>
            | <a href="<?=ROOT_URL?>">Главная</a>
            | <a href="<?=ROOT_URL?>article/add">Добавить статью</a>
            | <a href="<?=ROOT_URL?>logout">Выйти</a>
            | <a href="<?=ROOT_URL?>test">Logs</a>
            | <a href="<?=ROOT_URL?>info">Info</a>
            | <a href="<?=ROOT_URL?>categories/revision">Категории</a>
            | Вы зашли как <?= $user['login']; ?>
        <?php elseif (checkYourPrivilegie($user, USER_LVL)): ?>
            | <a href="<?=ROOT_URL?>">Главная</a>
            | <a href="<?=ROOT_URL?>article/add">Добавить статью</a>
            | <a href="<?=ROOT_URL?>logout">Выйти</a>
            | Вы зашли как <?= $user['login']; ?>
        <?php else: ?>
            | <a href="<?=ROOT_URL?>">Главная</a>
            | <a href="<?=ROOT_URL?>registr">Регистрация</a>
            | <a href="<?=ROOT_URL?>login">Войти</a>
        <?php endif; ?>
        </header>


        <main>
    <?php if( $articleAdded ): ?>
    <div class="alert alert-success">
        Ваша статья была отправлена на модерацию!
    </div>
    <hr>
    <?php endif; ?>
            <div class="container">
                <div class="main-content">
                    <aside id='nav'>
                        <nav>
                            <ul>
                                <?php foreach($categories as $category): ?>
                                    <li><a href="<?=ROOT_URL . 'category/' . $category['url'];?>"> <?=$category['cat_name'];?> </a></li>
                                <?php endforeach; ?>
                            </ul>
                        </nav>
                    </aside>

                    <?= $content ?>

                </div>
            </div>
        </main>

        <footer id="footer">

            <div>
                <ul>
                    <?php foreach($categories as $category): ?>
                        <li style='display:inline;margin-right:15px'><a href="<?=ROOT_URL . 'category/' . $category['url'];?>"><?=$category['cat_name'];?> </a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <a href="<?=ROOT_URL?>">Вернуться на главную</a> &copy ex nihilo  &#8211 2020
        </footer>
    <div>
</body>
</html>
