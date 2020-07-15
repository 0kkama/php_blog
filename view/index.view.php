<!DOCTYPE html>
<html>
<head>
    <title>Главная</title>
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
    <div id="content">
    	<?php foreach($articles as $article): ?>
    			<h1><?=$article['title']?></h1>
                <blockquote><i> <?= 'by ' . $article['author'];?></i></blockquote>
                <p><?=mb_substr($article['content'], 0, 100) . '...';?></p>
    			<a href="index.php?point=article&id=<?=$article['art_id']?>">Read more</a>
        <?php endforeach; ?>
    </div>
    <div id='nav'>
        <h2> Категории </h2>
        <ul>
            <?php foreach($categories as $category): ?>
                <li><a href="index.php?point=category&id=<?=$category['url'];?>"> <?=$category['cat_name'];?> </a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
