<main>
    <div id="content">
        <article class="article">
            <h1><?= $title?></h1>
            <p><?= $content?></p>
            <hr>
            <div class="article-actions">
                <a href="/delete/<?=$art_id?>">Remove</a><br>
                <a href="/edit/<?=$art_id?>">Edit</a><br>
            </div>
        </article>
    </div>
</main>
