<div id="content">
    <?php foreach($articles as $article): ?>
        <div class="article-preview">
            <h1><?=$article['title']?></h1>
            <blockquote><i> <?= 'by ' . $article['author'];?></i></blockquote>
            <p><?=mb_substr($article['content'], 0, 100) . '...';?></p>
            <a href="<?=ROOT_URL . 'article/watch/' . $article['art_id']?>">Читать далее...</a>
        </div>
    <?php endforeach; ?>
</div>
