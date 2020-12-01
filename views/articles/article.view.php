<main>
    <div id="content">
        <article class="article">
            <h1><?= $title?></h1>
            <p><?= $content?></p>
            <blockquote><i> <?= 'Автор: ' . $author . '<br>' .' Категория: ' . $cat_name ;?></i></blockquote>
            <hr>
                <?php if($manipulation): ?>
            <div class="article-actions">
                <a href="<?=ROOT_URL . 'article/delete/' . $art_id?>">Remove</a><br>
                <a href="<?=ROOT_URL . 'article/edit/' . $art_id?>">Edit</a><br>
            </div>
                <?php endif; ?>
        </article>
    </div>
</main>
