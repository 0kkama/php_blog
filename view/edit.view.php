<!DOCTYPE html>
<html>
<head>
    <title>Главная</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/styles.css" />
</head>

<div class="form">
    <?php if($editStatus): ?>
        <p>Your article was successfully edited!</p>
        <a href="index.php">Return to main page</a><br>
    <?php else: ?>
        <form method="post">
            <input type="hidden" name="id" value="<?=$article[0]['art_id'] ?? $params['art_id'];?>">
            Edit Title of your article:<br>
            <input type="text" name="title" value="<?=$article[0]['title'] ?? $params['title'];?>" size="40"><br>
            Or Edit Content of your article:<br>
            <textarea name="content" cols="57" rows="30"><?=$article[0]['content'] ?? $params['content'];?></textarea><br>
                Choose category of your article: <br>
            <select name='cat_id' size='1'>
                <?php foreach ($categories as $category): ?>
        <option value= <?=$category['cat_id']?> <?=(($article[0]['cat_id'] ?? $params['cat_id']) == $category['cat_id']) ? 'selected' : '' ?>>
                        <?=$category['cat_name']?>
                    </option>
                <?php endforeach; ?>
            </select>

            <button>Send</button>
            <p><?=$errMsg ?? ''?></p>
        </form>
        <hr>
        <a href="index.php">Move to main page</a>
    <?php endif; ?>
</div>
    <?= $_SERVER['REQUEST_METHOD']; ?>

</html>
