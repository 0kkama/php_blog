<?php
	include_once('functions.php');
	$articles = getArticles();
	include_once ('styles.php');
?>

<a href="add.php">Add article</a>
<hr>
<div class="articles">
	<?php foreach($articles as $id => $article): ?>
		<div class="article">
			<h2><?=$article['title']?></h2>
			<a href="article.php?id=<?=$id?>">Read more</a>
		</div>
	<?php endforeach; ?>
</div>
