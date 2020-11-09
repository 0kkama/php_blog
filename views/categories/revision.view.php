<div id="content">
        <div class="article-actions">
            <ul>
                <?php foreach($categories as $category): ?>
                    <li>
                        <a href="/deletecat/<?=$category['url'];?>">Remove</a> |
                        <a href="/editcat/<?=$category['url'];?>">Edit</a> |
                        <?=$category['cat_name'];?> | <?=$category['url'];?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <form method="post">
            <p><?php echo $errMsg ?? ''?></p>
            Add new category:<br>
            <div class="form-group">
                <input type="text" name="cat_name" class="form-control" value="<?=$newCategory['cat_name'] ?? '' ?>" size="40" placeholder="Название категории">
            </div>
            <div class="form-group">
                <input type="text" name="url" class="form-control" value="<?=$newCategory['url'] ?? '' ?>" size="40" placeholder="Category URL">
            </div>

            <button type="submit" class="btn btn-primary">Add</button>
        </form>
</div>

