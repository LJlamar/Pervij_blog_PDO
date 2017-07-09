<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Мой первый блог</title>
        <link rel="stylesheet" href="../style.css">
        </head>
    <body>
        <div class="container">
            <h1>Вы действительно хотите удалить данную статью?</h1>
            <p><?php echo($a['title']);?><p>
            <div>
                <!--<form method="post">-->
                <form method="post" action="index.php?action=delete&id=<?php echo($a['id']);?>">
                    <label>
                        <input type="text" name="id" value="<?php echo($a['id']);?>" class="form-item" required hidden="">
                    </label>
                    <input type="submit" value="Да" class="btn">
                </form>
                <form action="../admin/">
                    <input type="submit" value="Нет" class="btn">
                </form>
            </div>
            <footer>
                <p>Мой первый блог<br>Copyright &copy;2017</p>
            </footer>
        </div>
    </body>
</html>