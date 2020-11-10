<div id="content">
    <form method="post">
        Edit name of your category:<br>
            <div class="form-group">
                <input type="text" name="cat_name" class="form-control" value="<?=$category['cat_name'] ?? '' ?>" size="40" placeholder="Название категории">
            </div>
        Edit URL of your category:<br>
            <div class="form-group">
                <input type="text" name="url" class="form-control" value="<?=$category['url'] ?? '' ?>" size="40" placeholder="Category URL">
            </div>

        <button type="submit" class="btn btn-primary">Edit</button>
        <p><?=$errMsg ?? ''?></p>
    </form>
    <hr>
    <a href="/revision">Go back</a><br>
    <a href="/">Move to main page</a>
</div>

