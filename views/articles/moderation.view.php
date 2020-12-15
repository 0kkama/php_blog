<table border="1">
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
        <td><a href="edit/<?=$article['art_id'];?>">edit</a></td>
        <td><a href="watch/<?=$article['art_id'];?>">wtch</a></td>
        <td><a href="publication/<?=$article['art_id'];?>">publ</a></td>
        <!-- <td><a href="delete/<?=$article['art_id'];?>">arch</a></td> -->
        <td><a href="archivation/<?=$article['art_id'];?>">arch</a></td>
        <td><a href="examination/<?=$article['art_id'];?>">mod</a></td>
    </tr>
    <?php endforeach;?>
</table>
