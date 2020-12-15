<main>
    <div id="content">
        <article class="article">
            <h1><?= $title ?></h1>
            <br>
            <pre><?= $content ?></pre>
            <blockquote><i> <?= 'Автор: ' . $author . '<br>' .' Категория: ' . $cat_name ;?></i></blockquote>
            <hr>
            <?php if($baseRights): ?>
                <div class="article-actions">
                    <a href="<?=ROOT_URL . 'article/edit/' . $art_id?>">Редактировать</a><br>
                    <a href="<?=ROOT_URL . 'article/delete/' . $art_id?>">Удалить</a><br>
                    <?php if($moderRights):?>
                        <a href="<?=ROOT_URL . 'publication/remove/' . $art_id?>">Опубликовать</a><br>
                        <a href="<?=ROOT_URL . 'article/remove/' . $art_id?>">Уничтожить</a><br>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </article>
    </div>
</main>
