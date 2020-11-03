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
            | <a href="/">Main</a>
            | <a href="/add">Add article</a>
            | <a href="/logs">Logs</a>
            | <a href="/info">Info</a>
        </header>

        <main>
            <div class="container">
                <div class="main-content">
                    <aside id='nav'>
                        <nav>
                            <ul>
                                <?php foreach($categories as $category): ?>
                                    <li><a href="/category/<?=$category['url'];?>"> <?=$category['cat_name'];?> </a></li>
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
                        <li style='display:inline;margin-right:15px'><a href="/category/<?=$category['url'];?>"><?=$category['cat_name'];?> </a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <a href="/">Move to main page</a> &copy ex nihilo  &#8211 2020
        </footer>
    <div>
</body>
</html>
