<div id="content">
    <?php if($editStatus): ?>
        <p>Your article was successfully edited!</p>
        <a href="<?=ROOT_URL?>">Return to main page</a><br>
    <?php else: ?>
        <?php if ( !empty($errMsg) ):?>
            <div class="alert alert-warning">
                <p> <?= $errMsg ?></p>
            </div>
        <?php endif;?>
        <form method="post">
            <input type="hidden" name="id" value="<?=$article['art_id']?>">
            Edit Title of your article:<br>
            <div class="form-group">
            <input type="text" name="title" class="form-control" value="<?=$article['title']?>" size="40"><br>
            </div>
            Edit Content of your article:<br>
            <div class="form-group">
            <textarea name="content" class="form-control" cols="57" rows="30"><?=$article['content']?></textarea><br>
                Change category of your article: <br>
            <div class="form-group">
            <select name='cat_id' class="custom-select" size='1'>
                <?php foreach ($categories as $category): ?>
        <option value= <?=$category['cat_id']?> <?=(($article['cat_id']) == $category['cat_id']) ? 'selected' : '' ?>>
                        <?=$category['cat_name']?>
                    </option>
                <?php endforeach; ?>
            </select>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
        <hr>
        <a href="<?=ROOT_URL . 'article/' . $article['art_id']?>">Go back</a><br>
        <a href="<?=ROOT_URL?>">Move to main page</a>
    <?php endif; ?>
</div>
