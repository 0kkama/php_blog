
<div id="content">
    <?php if($sendStatus): ?>
        <p>Your article was sent!</p>
        <a href="<?=ROOT_URL?>">Return to main page</a><br>
        <a href="<?=ROOT_URL?>article/add">Add another article</a>
    <?php else: ?>
        <?php if ( !empty($errMsg) ):?>
            <div class="alert alert-warning">
                <p> <?= $errMsg ?></p>
            </div>
        <?php endif;?>
        <form method="post">
            Title of your article:<br>
            <div class="form-group">
                <input type="text" name="title" class="form-control" value="<?=$article['title'] ?? '' ?>" size="40" placeholder="Title">
            </div>

            Content of your article:<br>
            <div class="form-group">
                <textarea name="content" placeholder="Burn motherfucker, burn!" cols="57" class="form-control" rows="30"><?=$article['content'] ?? '' ?></textarea>
            </div>
            Choose category of your article: <br>
            <div class="form-group">
            <select name='cat_id' class="custom-select" size='1'>
                <?php foreach ($categories as $category): ?>
    <option value= <?=$category['cat_id']?> <?=($category['cat_id'] == ($article['cat_id'] ?? 1)) ? 'selected' : '' ?>> <?=$category['cat_name']?>
                    </option>
                <?php endforeach; ?>
            </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        <hr>
        <a href="<?=ROOT_URL?>">Move to main page</a>
            <?php endif; ?>
</div>
