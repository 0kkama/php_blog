<!DOCTYPE html>
<html>
<head>
    <title><?=$article[0]['title']?></title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/styles.css" />
</head>
<body>
<div class="content">
        <div class="article">
            <h1><?=$article[0]['title']?></h1>
            <div><?=$article[0]['content']?></div>
            <hr>
            <a href="index.php?point=delete&id=<?=$article[0]['art_id']?>">Remove</a><br>
            <a href="index.php?point=edit&id=<?=$article[0]['art_id']?>">Edit</a><br>
        </div>
 </div>
<hr>
<a href="index.php">Move to main page</a>
</body>
</html>
