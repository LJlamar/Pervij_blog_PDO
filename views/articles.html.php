<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Мой первый блог</title>
        <link rel="stylesheet" href="style.css">
        </head>
    <body>
        <div class="container">
            <h1>Мой первый блог</h1>
            <h5><a href="admin">Панель администрирования</a></h5>
            
        <div>
        <?php foreach($articles as $a): ?>
            <div class="article">
                <h3><a href="article.php?id=<?php echo($a['id']);?>"><?php echo($a['title']);?></a></h3>
                <em>Опубликовано: <?php echo($a['date']);?></em>
                <p><?php echo($a['title']);?></p>
            </div>
            <?php endforeach; ?>
        </div>
        
            <footer>
                <p>Мой первый блог<br>Copyright &copy;2017</p>
            </footer>
        </div>
    </body>
</html>