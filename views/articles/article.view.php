<main>
    <div id="content">
        <article class="article">
            <h1><?= $title ?></h1>
            <br>
            <pre><?= $content ?></pre>
            <blockquote><i> <?= 'Автор: ' . $author . '<br>' .' Категория: ' . $cat_name ;?></i></blockquote>
            <hr>
                <?php if($manipulation): ?>
            <div class="article-actions">
                <a href="<?=ROOT_URL . 'article/delete/' . $art_id?>">Удалить</a><br>
                <a href="<?=ROOT_URL . 'article/edit/' . $art_id?>">Редактировать</a><br>
            </div>
                <?php endif; ?>
        </article>
    </div>
</main>
