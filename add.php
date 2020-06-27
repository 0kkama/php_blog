<?php
    declare(strict_types=1);
    include_once ('controller/config.php');
    include_once('library.php');
    include_once ('styles.php');
	$sendStatus = false;
	$errMsg = '';

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $titleArt = val($_POST['title']);
	    $contentArt = val($_POST['content']);

        if ($titleArt === '' || $contentArt === '') {
            $errMsg = 'Заполните все поля!';
        } else {
            addArticle($titleArt, $contentArt);
            $sendStatus = true;
        }
    } else {
        $titleArt = '';
        $contentArt = '';
    }
?>
	<div class="form">
    <?php if($sendStatus): ?>
        <p>Your article is sent!</p>
        <a href="index.php">Return to main page</a><br>
        <a href="add.php">Add another article</a>
    <?php else: ?>
        <form method="post">
            Title of your article:<br>
            <input type="text" name="title" value="<?=$titleArt?>" size="40"><br>
            Content of your article:<br>
            <textarea name="content" cols="57" rows="30"> <?=$contentArt?> </textarea><br>
            <button>Send</button>
            <p><?=$errMsg?></p>
        </form>
        <hr>
        <a href="index.php">Move to main page</a>
    <?php endif; ?>
</div>

