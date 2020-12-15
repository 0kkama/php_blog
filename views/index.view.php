<div id="content">
	<?php foreach($articles as $article): ?>
        <div class="article-preview">
			<h1><?=$article['title']?></h1>
            <blockquote><i> <?= 'Автор: ' . $article['author'] . '<br>' .' Категория: ' . $article['cat_name'];?></i></blockquote>
            <p><?=mb_substr($article['content'], 0, 100) . '...';?></p>
			<a href="<?=ROOT_URL . 'article/watch/' . $article['art_id']?>">Читать далее...</a>
            <!-- <button type="button" class="btn btn-primary">Primary</button> -->
        </div>
    <?php endforeach; ?>
</div>



