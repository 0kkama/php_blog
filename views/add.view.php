
<div id="content">
    <?php if($sendStatus ?? false): ?>
        <p>Your article is sent!</p>
        <a href="/">Return to main page</a><br>
        <a href="index.php?point=add">Add another article</a>
    <?php else: ?>
        <form method="post">
            Title of your article:<br>
            <div class="form-group">
                <input type="text" name="title" class="form-control" value="<?=$article['title'] ?? '' ?>" size="40" placeholder="Title of your article">
            </div>

            Content of your article:<br>
            <div class="form-group">
                <textarea name="content" cols="57" class="form-control" rows="30"><?=$article['content'] ?? '' ?></textarea>
            </div>
            Choose category of your article: <br>
            <div class="form-group">
            <select name='cat_id' class="custom-select" size='1'>
                <?php foreach ($categories as $category): ?>
    <option value= <?=$category['cat_id']?> <?=($category['cat_id'] == $article['cat_id']) ? 'selected' : '' ?>> <?=$category['cat_name']?>
                    </option>
                <?php endforeach; ?>
            </select>
            </div>

            User:<br>
            <div class="form-group">
            <select name='user_id' class="custom-select" id="inputGroupSelect01">
                <?php foreach ($authors as $author): ?>
    <option value= <?=$author['user_id']?> <?=($author['user_id'] == $article['user_id']) ? 'selected' : '' ?>> <?=$author['login']?>
                    </option>
                <?php endforeach; ?>
            </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <p><?=$errMsg ?? ''?></p>
        </form>
        <hr>
        <a href="/">Move to main page</a>
            <?php endif; ?>
</div>
