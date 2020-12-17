<ul>
    <li>ЛОГИН:  <?=$userData['login']?></li>
    <li>ИМЯ:  <?=$userData['name']?></li>
    <li>ФАМИЛИЯ:  <?=$userData['surname']?></li>
    <li>ДАТА:  <?=$userData['date']?></li>
    <li>ПОЧТА:  <?=$userData['email']?></li>
    <li>СТАТУС:  <?=$userData['status']?></li>
    <li><a href="/<?=$userData['user_id'];?>">Изменить</a></li>
<!--    TODO сделаь функционал для изменения данных пользователя -->
</ul>

<br>
<table border="1">
    <tr>
        <th>TITLE</th>
        <th>CATEGORY</th>
        <th>DATE</th>
    </tr>
    <?php foreach ($articles as $article): ?>
        <tr>
            <td><a href="/article/watch/<?=$article['art_id'];?>"><?=$article['title']?></a></td>
            <td><?=$article['cat_name']?></td>
            <td><?=$article['date']?></td>
        </tr>
    <?php endforeach;?>
</table>

