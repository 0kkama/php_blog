<table border="1">
    <td></td>
    <td><a href="/article/moderation/">Все</a></td>
    <td><a href="/article/moderation?q=mod">Модерируемые</a></td>
    <td><a href="/article/moderation?q=pub">Опубликованные</a></td>
    <td><a href="/article/moderation?q=arh">Архив</a></td>

    <tr>
        <th>AID</th>
        <th>USER</th>
        <th>TITLE</th>
        <th>CATEGORY</th>
        <th>DATE</th>
        <th>STS</th>
        <th>edit</th>
        <th>wtch</th>
        <th>publ</th>
        <th>arch</th>
        <th>mod</th>

    </tr>
    <?php foreach ($articles as $article): ?>
    <tr>
        <td><?=$article['art_id']?></td>
        <td><?=$article['author']?></td>
        <td><?=$article['title']?></td>
        <td><?=$article['cat_name']?></td>
        <td><?=$article['date']?></td>
        <td><?=$article['moderation']?></td>
        <td><a href="/article/edit/<?=$article['art_id'];?>">edit</a></td>
        <td><a href="/article/watch/<?=$article['art_id'];?>">wtch</a></td>
        <td><a href="/article/publication/<?=$article['art_id'];?>">publ</a></td>
        <td><a href="/article/archivation/<?=$article['art_id'];?>">arch</a></td>
        <td><a href="/article/examination/<?=$article['art_id'];?>">mod</a></td>
    </tr>
    <?php endforeach;?>
</table>
