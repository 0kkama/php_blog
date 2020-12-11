<table border="1">
   <tr>
        <th>UID</th>
        <th>ЛОГИН</th>
        <th>ИМЯ</th>
        <th>ФАМИЛИЯ</th>
        <th>РЕГИСТРАЦИЯ</th>
        <th>ПОЧТА</th>
        <th>LVL</th>
        <th>STAT</th>
        <th>usr</th>
        <th>mod</th>
        <th>ban</th>
   </tr>
   <?php foreach ($users as $user): ?>
   <tr>
        <td><?=$user['user_id']?></td>
        <td><?=$user['login']?></td>
        <td><?=$user['name']?></td>
        <td><?=$user['surname']?></td>
        <td><?=$user['date']?></td>
        <td><?=$user['email']?></td>
        <td><?=$user['level']?></td>
        <td><?=$user['status']?></td>
        <td><a href="users/regain/<?=$user['user_id'];?>">usr</a></td>
        <td><a href="users/moder/<?=$user['user_id'];?>">mod</a></td>
        <td><a href="users/expel/<?=$user['user_id'];?>">ban</a></td>
  </tr>
<?php endforeach;?>
 </table>
