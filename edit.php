<?php
include_once('functions.php');
include_once ('styles.php');

$errMsg = '';
$editStatus = false;

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $artId = (int) (val((   $_GET['id'] ?? 0   )));
        $artArray = getArticles();
        $editTitle = $artArray[$artId]['title'];
        $editContent = $artArray[$artId]['content'];
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $artId = val( $_POST['id'] );
        $editTitle = val( $_POST['title'] );
        $editContent = val( $_POST['content'] );

        if ($editTitle === '' || $editContent === '') {
            $errMsg = 'Поля не должны быть пустыми!';
        } else {
            editArticle($artId, $editTitle, $editContent);
            $editStatus = true;
        }
} else {
    echo 'What\'s wrong with you?';
}
?>
<div class="form">
    <?php if($editStatus): ?>
        <p>Your article was successfully edited!</p>
        <a href="index.php">Return to main page</a><br>
<!--        <a href="add.php">Add another article</a>-->
    <?php else: ?>
        <form method="post">
            <input type="hidden" name="id" value="<?=$artId?>">
            Edit Title of your article:<br>
            <input type="text" name="title" value="<?=$editTitle?>" size="40"><br>
            Or Edit Content of your article:<br>
            <textarea name="content" cols="57" rows="30"> <?=$editContent?> </textarea><br>
            <button>Send</button>
            <p><?=$errMsg?></p>
        </form>
        <hr>
        <a href="index.php">Move to main page</a>
    <?php endif; ?>
</div>
