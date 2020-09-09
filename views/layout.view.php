<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?></title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/styles.css" />
</head>

<body>
    <div id='header'>
        <a href="index.php?point=add">Add article</a>
        | <a href="index.php?point=logs">Go to logs</a>
        | <a href="index.php?point=info">Go to info</a>
        <span class="slogan"> Эй, верстальщик! <!-- Ты пидор! --> </span>
    </div>

    <?= $content ?>

    <div id='nav'>
        <h2> Категории </h2>
        <ul>
            <?php foreach($categories as $category): ?>
                <li><a href="index.php?point=category&id=<?=$category['cat_id'];?>"> <?=$category['cat_name'];?> </a></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div id="footer">
        <div>
            <ul>
                <?php foreach($categories as $category): ?>
                    <li style='display:inline;margin-right:15px'><a href="index.php?point=category&id=<?=$category['cat_id'];?>"><?=$category['cat_name'];?> </a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <a href="index.php">Move to main page</a> &copy ex nihilo  &#8211 2020
    </div>

</body>
</html>
