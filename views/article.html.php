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
            <a href="../blog2/">Назад</a>
        
            <div>
                <div class="article">
                    <h3><?php echo($article['title']);?></h3>
                    <p><?php echo($article['text']);?></p>
                    <em>Опубликовано: <?php echo($article['date']);?></em>
                </div>
            </div>
        
            <footer>
                <p>Мой первый блог<br>Copyright &copy;2017</p>
            </footer>
        </div>
    </body>
</html>