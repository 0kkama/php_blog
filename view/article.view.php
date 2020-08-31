<!DOCTYPE html>
<html>
<head>
    <title><?=$article['title']?></title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/styles.css" />
</head>
<body>
<div class="content">
        <div class="article">
            <h1><?=$article['title']?></h1>
            <div><?=$article['content']?></div>
            <hr>
            <a href="index.php?point=delete&id=<?=$article['art_id']?>">Remove</a><br>
            <a href="index.php?point=edit&id=<?=$article['art_id']?>">Edit</a><br>
        </div>
 </div>
<hr>
<a href="index.php">Move to main page</a>
</body>
</html>
