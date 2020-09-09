
<div id="content">
    <?php if($sendStatus ?? false): ?>
        <p>Your article is sent!</p>
        <a href="index.php">Return to main page</a><br>
        <a href="index.php?point=add">Add another article</a>
    <?php else: ?>
        <form method="post">
            Title of your article:<br>
            <input type="text" name="title" value="<?=$article['title'] ?? '' ?>" size="40"><br>
            Content of your article:<br>
            <textarea name="content" cols="57" rows="30"><?=$article['content'] ?? '' ?></textarea><br>
            Choose category of your article: <br>
            <select name='cat_id' size='1'>
                <?php foreach ($categories as $category): ?>
    <option value= <?=$category['cat_id']?> <?=($category['cat_id'] == $article['cat_id']) ? 'selected' : '' ?>> <?=$category['cat_name']?>
                    </option>
                <?php endforeach; ?>
            </select>

            <select name='user_id' size='1'>
                <?php foreach ($authors as $author): ?>
    <option value= <?=$author['user_id']?> <?=($author['user_id'] == $article['user_id']) ? 'selected' : '' ?>> <?=$author['login']?>
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
