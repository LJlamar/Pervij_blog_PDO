<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Мой первый блог</title>
        <link rel="stylesheet" href="../style.css">
        </head>
    <body>
        <div class="container">
            <h1>Мой первый блог</h1>
            <div>
            <a href="index.php?action=add">Добавить статью</a><br>
            <a href="../">Назад</a>
                <table class ="admin-table">
                <tr>
                    <th>Дата</th>
                    <th>Заголовок</th>
                    <th></th>
                    <th></th>
                </tr>
                    <?php foreach($articles as $a): ?>
                    <tr>
                        <td><?php echo $a['date'];?></td>
                        <td><?php echo $a['title'];?></td>
                        <td><a href="index.php?action=edit&id=<?php echo $a['id'];?>">Редактировать</a></td>
                        <td><a href="index.php?action=delete&id=<?php echo $a['id'];?>">Удалить</a></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <footer>
                <p>Мой первый блог<br>Copyright &copy;2017</p>
            </footer>
        </div>
    </body>
</html>
