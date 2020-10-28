<div id="content">
    <?php foreach($articles as $article): ?>
        <div class="article-preview">
            <h1><?=$article['title']?></h1>
            <blockquote><i> <?= 'by ' . $article['author'];?></i></blockquote>
            <p><?=mb_substr($article['content'], 0, 100) . '...';?></p>
            <a href="/article/<?=$article['art_id']?>">Read more</a>
        </div>
    <?php endforeach; ?>
</div>
