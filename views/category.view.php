    <div id="content">
        <?php foreach($articles as $article): ?>
                <h1><?=$article['title']?></h1>
                <blockquote><i> <?= 'by ' . $article['author'];?></i></blockquote>
                <p><?=mb_substr($article['content'], 0, 100) . '...';?></p>
                <a href="index.php?point=article&id=<?=$article['art_id']?>">Read more</a>
        <?php endforeach; ?>
    </div>
