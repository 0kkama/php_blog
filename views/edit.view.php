<div id="content">
    <?php if($editStatus): ?>
        <p>Your article was successfully edited!</p>
        <a href="/">Return to main page</a><br>
    <?php else: ?>
        <form method="post">
            <input type="hidden" name="id" value="<?=$article['art_id']?>">
            Edit Title of your article:<br>
            <input type="text" name="title" value="<?=$article['title']?>" size="40"><br>
            Or Edit Content of your article:<br>
            <textarea name="content" cols="57" rows="30"><?=$article['content']?></textarea><br>
                Choose category of your article: <br>
            <select name='cat_id' size='1'>
                <?php foreach ($categories as $category): ?>
        <option value= <?=$category['cat_id']?> <?=(($article['cat_id']) == $category['cat_id']) ? 'selected' : '' ?>>
                        <?=$category['cat_name']?>
                    </option>
                <?php endforeach; ?>
            </select>

            <button>Send</button>
            <p><?=$errMsg ?? ''?></p>
        </form>
        <hr>
        <a href="/article/<?=$article['art_id']?>">Go back</a><br>
        <a href="/">Move to main page</a>
    <?php endif; ?>
</div>
