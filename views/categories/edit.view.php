<div id="content">
    <form method="post">
        Изменить назване категории:<br>
            <div class="form-group">
                <input type="text" name="cat_name" class="form-control" value="<?=$category['cat_name'] ?? '' ?>" size="40" placeholder="Название категории">
            </div>
        Изменить URL категории:<br>
            <div class="form-group">
                <input type="text" name="url" class="form-control" value="<?=$category['url'] ?? '' ?>" size="40" placeholder="Category URL">
            </div>

        <button type="submit" class="btn btn-primary">Изменить</button>
        <p><?=$errMsg ?? ''?></p>
    </form>
    <hr>
    <a href="<?=ROOT_URL?>categories/revision">Вернуться назад</a><br>
    <a href="<?=ROOT_URL?>">Вернуться на главную</a>
</div>

